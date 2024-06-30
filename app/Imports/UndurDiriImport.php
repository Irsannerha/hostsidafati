<?php

namespace App\Imports;

use App\Models\UndurDiri;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UndurDiriImport implements ToModel, WithHeadingRow, WithStartRow
{
    public function model(array $row)
    {
        // Log the row data for debugging purposes
        Log::info('Importing row: ', $row);

        // Validate that the 'prodi' column is not null
        if (!isset($row['prodi']) || is_null($row['prodi'])) {
            Log::error('The "prodi" column is null for row: ', $row);
            return null; // Skip this row
        }

        // Get the Prodi model based on the 'prodi' name
        $prodi = Prodi::where('prodi', $row['prodi'])->first();

        // Validate that the Prodi exists
        if (!$prodi) {
            Log::error('Prodi not found for row: ', $row);
            return null; // Skip this row
        }

        // Validate that the 'ts_id' column is not null
        if (!isset($row['tahun']) || is_null($row['tahun'])) {
            Log::error('The "tahun" column is null for row: ', $row);
            return null; // Skip this row
        }

        // Ensure that tahun is an integer and corresponds to an existing Tahun ID
        $tahun = Tahun::where('ts', $row['tahun'])->first();
        if (!$tahun) {
            Log::error('Tahun not found for row: ', $row);
            return null; // Skip this row
        }

        Log::info('Row is valid. Creating UndurDiri entry.');

        return new UndurDiri([
            'prodi_id' => $prodi->id,
            'ts_id' => $tahun->id,
            'mhs_undur_diri_genap' => $row['mhs_undur_diri_genap'],
            'mhs_undur_diri_ganjil' => $row['mhs_undur_diri_ganjil'],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

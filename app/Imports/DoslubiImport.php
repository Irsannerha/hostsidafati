<?php

namespace App\Imports;

use App\Models\Doslubi;
use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class DoslubiImport implements ToModel, WithHeadingRow, WithStartRow
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

        $doslubi = new Doslubi([
            'prodi_id' => $prodi->id,
            'nama' => $row['nama'],
            'nup_nidk' => $row['nup_nidk'],
            'jurusan' => $row['jurusan'],
            'status' => $row['status'],
            'tgl_lahir' => \Carbon\Carbon::parse($row['tgl_lahir']),
            'jabatan_terakhir' => $row['jabatan_terakhir'],
        ]);

        return $doslubi;
    }

    public function startRow(): int
    {
        return 2;
    }
}

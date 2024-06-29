<?php

namespace App\Imports;

use App\Models\Pejabat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;


class PejabatImport implements ToModel, WithHeadingRow, WithStartRow
{
    public function model(array $row)
    {
        // Log the row data for debugging purposes
        Log::info('Importing row: ', $row);

        // Validate that the 'nama' column is not null
        if (!isset($row['nama']) || is_null($row['nama'])) {
            Log::error('The "nama" column is null for row: ', $row);
            return null; // Skip this row
        }

        return new Pejabat([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'pangkat_golongan' => $row['pangkat_golongan'],
            'jabatan' => $row['jabatan'],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

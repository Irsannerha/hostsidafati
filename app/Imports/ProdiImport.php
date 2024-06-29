<?php

namespace App\Imports;

use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class ProdiImport implements ToModel, WithHeadingRow, WithStartRow
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

        $prodi = new Prodi([
            'prodi' => $row['prodi'],
            'email' => $row['email'],
            'kapro' => $row['kapro'],
            'fakultas' => $row['fakultas'],
            'akreditasi' => $row['akreditasi'],
            'prodik' => $row['prodik'],
            'jumlah_mahasiswa' => $row['jumlah_mahasiswa'],
            'tgl_pendirian' => \Carbon\Carbon::parse($row['tgl_pendirian']),
            'deskripsi' => $row['deskripsi'],
            'jumlah_dosen' => $row['jumlah_dosen'],
        ]);

        return $prodi;
    }

    public function startRow(): int
    {
        return 2;
    }
}

<?php

namespace App\Imports;

use App\Models\Taslab;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class TaslabImport implements ToModel, WithHeadingRow, WithStartRow
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

        $taslab = new Taslab([
            'nama' => $row['nama'],
            'unit_kerja' => $row['unit_kerja'],
            'pendidikan' => $row['pendidikan'],
            'tmt' => \Carbon\Carbon::parse($row['tmt']),
            'status_pegawai' => $row['status_pegawai'],
            'jabatan' => $row['jabatan'],
            'bagian_tugas' => $row['bagian_tugas'],
            'nitk' => $row['nitk'],
            'tgl_lahir' => \Carbon\Carbon::parse($row['tgl_lahir']),
            'no_hp' => $row['no_hp'],
            'email' => $row['email'],
        ]);

        return $taslab;
    }

    public function startRow(): int
    {
        return 2;
    }
}

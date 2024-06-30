<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class DosenImport implements ToModel, WithHeadingRow, WithStartRow
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

        // Find or create Prodi
        $prodi = Prodi::firstOrCreate(['prodi' => $row['prodi']]);

        // Create Dosen
        return new Dosen([
            'nama' => $row['nama'],
            'prodi_id' => $prodi->id,
            'nip_nrk' => $row['nip_nrk'],
            'tgl_lahir' => \Carbon\Carbon::parse($row['tgl_lahir']),
            'pendidikan' => $row['pendidikan'],
            'status_nidn_nidk' => $row['status_nidn_nidk'],
            'status_pegawai' => $row['status_pegawai'],
            'jabfung' => $row['jabfung'],
            'tmt_jabfung_terakhir' => $row['tmt_jabfung_terakhir'],
            'target_kenaikan_jabfung' => $row['target_kenaikan_jabfung'],
            'tmt_masuk_itera' => $row['tmt_masuk_itera'],
            'tmt' => $row['tmt'],
            'pekerti' => $row['pekerti'],
            'serdos' => $row['serdos'],
            'status_dosen' => $row['status_dosen'],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

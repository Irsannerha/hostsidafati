<?php

namespace App\Imports;

use App\Models\Dosbel;
use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class DosbelImport implements ToModel, WithHeadingRow, WithStartRow
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

        $dosbel = new Dosbel([
            'prodi_id' => $prodi->id,
            'nama' => $row['nama'],
            'nip_nrk' => $row['nip_nrk'],
            'status' => $row['status'],
            'tempat_studi' => $row['tempat_studi'],
            'jenis_beasiswa' => $row['jenis_beasiswa'],
            'mulai_tubel' => \Carbon\Carbon::parse($row['mulai_tubel']),
            'selesai_tubel' => \Carbon\Carbon::parse($row['selesai_tubel']),
            'sk_tubel' => $row['sk_tubel'],
            'perpanjangan_tubel' => $row['perpanjangan_tubel'],
            'mulai_perpanjangan' => isset($row['mulai_perpanjangan']) ? \Carbon\Carbon::parse($row['mulai_perpanjangan']) : null,
            'selesai_perpanjangan' => isset($row['selesai_perpanjangan']) ? \Carbon\Carbon::parse($row['selesai_perpanjangan']) : null,
            'keterangan' => $row['keterangan'],
        ]);

        return $dosbel;
    }

    public function startRow(): int
    {
        return 2;
    }
}

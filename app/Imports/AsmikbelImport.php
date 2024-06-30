<?php

namespace App\Imports;

use App\Models\Asmikbel;
use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class AsmikbelImport implements ToModel, WithHeadingRow, WithStartRow
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

        $asmikbel = new Asmikbel([
            'prodi_id' => $prodi->id,
            'nama' => $row['nama'],
            'nip_nrk' => $row['nip_nrk'],
            'status' => $row['status'],
            'studi_lanjut' => $row['studi_lanjut'],
            'beasiswa' => $row['beasiswa'],
            'mulai_tubel' => \Carbon\Carbon::parse($row['mulai_tubel']),
            'selesai_tubel' => \Carbon\Carbon::parse($row['selesai_tubel']),
            'sk_tubel' => $row['sk_tubel'],
            'status_asmik' => $row['status_asmik'],
            'keterangan' => $row['keterangan'],
        ]);

        return $asmikbel;
    }

    public function startRow(): int
    {
        return 2;
    }
}

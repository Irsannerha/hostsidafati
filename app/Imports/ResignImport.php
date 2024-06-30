<?php

namespace App\Imports;

use App\Models\Resign;
use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Log;

class ResignImport implements ToModel, WithHeadingRow, WithStartRow
{
    public function model(array $row)
    {
        Log::info('Importing row: ', $row);

        $prodi = Prodi::where('prodi', $row['prodi'])->first();
        if (!$prodi) {
            Log::error('Prodi not found for row: ', $row);
            return null;
        }

        return new Resign([
            'prodi_id' => $prodi->id,
            'nama' => $row['nama'],
            'nrk' => $row['nrk'],
            'nidn' => $row['nidn'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tmt_masuk' => $row['tmt_masuk'],
            'tmt_keluar' => $row['tmt_keluar'],
            'alasan' => $row['alasan'],
            'surat_keterangan' => $row['surat_keterangan'],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

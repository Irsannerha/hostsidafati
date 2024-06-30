<?php

namespace App\Imports;

use App\Models\Lulus;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LulusImport implements ToModel, WithHeadingRow, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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

        Log::info('Row is valid. Creating MhsAktif entry.');

        return new Lulus([
            'prodi_id' => $prodi->id,
            'ts_id' => $tahun->id,
            'januari' => $row['januari'],
            'februari' => $row['februari'],
            'maret' => $row['maret'],
            'april' => $row['april'],
            'mei' => $row['mei'],
            'juni' => $row['juni'],
            'juli' => $row['juli'],
            'agustus' => $row['agustus'],
            'september' => $row['september'],
            'oktober' => $row['oktober'],
            'november' => $row['november'],
            'desember' => $row['desember'],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

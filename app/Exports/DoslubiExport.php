<?php

namespace App\Exports;

use App\Models\Doslubi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DoslubiExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    public function collection()
    {
        return Doslubi::with('prodi')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NUP/NIDK',
            'Jurusan',
            'Status',
            'Tanggal Lahir',
            'Jabatan Terakhir',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($doslubi): array
    {
        return [
            $doslubi->id,
            $doslubi->prodi->prodi ?? 'N/A',
            $doslubi->nama,
            "'" . $doslubi->nup_nidk,
            $doslubi->jurusan,
            $doslubi->status,
            $doslubi->tgl_lahir,
            $doslubi->jabatan_terakhir,
            $doslubi->created_at,
            $doslubi->updated_at,
        ];
    }

    public function styles($sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => [
                        'argb' => 'FF1b3133',
                    ],
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 35,
            'C' => 35,
            'D' => 25,
            'E' => 30,
            'F' => 30,
            'G' => 20,
            'H' => 45,
            'I' => 20,
            'J' => 20,
        ];
    }
}

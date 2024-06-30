<?php

namespace App\Exports;

use App\Models\Dosbel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DosbelExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    public function collection()
    {
        return Dosbel::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIP/NRK',
            'Status',
            'Tempat Studi',
            'Jenis Beasiswa',
            'Mulai Tubel',
            'Selesai Tubel',
            'SK Tubel',
            'Perpanjangan Tubel',
            'Mulai Perpanjangan',
            'Selesai Perpanjangan',
            'Keterangan',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($dosbel): array
    {
        return [
            $dosbel->id,
            $dosbel->prodi->prodi ?? 'N/A',
            $dosbel->nama,
            "'" . $dosbel->nip_nrk,
            $dosbel->status,
            $dosbel->tempat_studi,
            $dosbel->jenis_beasiswa,
            $dosbel->mulai_tubel,
            $dosbel->selesai_tubel,
            $dosbel->sk_tubel,
            $dosbel->perpanjangan_tubel,
            $dosbel->mulai_perpanjangan,
            $dosbel->selesai_perpanjangan,
            $dosbel->keterangan,
            $dosbel->created_at,
            $dosbel->updated_at,
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
            'E' => 15,
            'F' => 30,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 15,
            'K' => 20,
            'L' => 20,
            'M' => 20,
            'N' => 30,
            'O' => 20,
            'P' => 20,
        ];
    }
}

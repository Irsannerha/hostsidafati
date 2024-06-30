<?php

namespace App\Exports;

use App\Models\Resign;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ResignExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return Resign::with('prodi')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NRK',
            'NIDN',
            'Jenis Kelamin',
            'TMT Masuk',
            'TMT Keluar',
            'Alasan',
            'Surat Keterangan',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($resign): array
    {
        return [
            $resign->id,
            $resign->prodi->prodi ?? 'N/A',
            $resign->nama,
            "'" . $resign->nrk,
            $resign->nidn,
            $resign->jenis_kelamin,
            $resign->tmt_masuk,
            $resign->tmt_keluar,
            $resign->alasan,
            $resign->surat_keterangan,
            $resign->created_at,
            $resign->updated_at,
        ];
    }

    public function styles($sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => [
                        'argb' => '1b3133',
                    ],
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' =>  5,
            'B' => 35,
            'C' => 30,
            'D' => 20,
            'E' => 20,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 30,
            'J' => 20,
            'K' => 20,
            'L' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Additional logic after sheet is created, if needed
            }
        ];
    }
}

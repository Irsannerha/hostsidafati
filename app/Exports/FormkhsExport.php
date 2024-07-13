<?php

namespace App\Exports;

use App\Models\FormKHS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormkhsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormKHS::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIM',
            'Nomor HP Mahasiswa',
            'Email',
            'Keperluan',
            'Jumlah',
            'Status',
            'Keterangan'
        ];
    }

    public function map($formkhs): array
    {
        return [
            $formkhs->id,
            $formkhs->prodi->prodi ?? 'N/A',
            $formkhs->nama,
            $formkhs->nim,
            $formkhs->no_hp_mhs,
            $formkhs->email,
            $formkhs->keperluan,
            $formkhs->jumlah,
            $formkhs->status,
            $formkhs->keterangan,
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
            'C' => 35,
            'D' => 25,
            'E' => 25,
            'F' => 30,
            'G' => 25,
            'H' => 15,
            'I' => 20,
            'J' => 30,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Additional formatting can be done here
            }
        ];
    }
}

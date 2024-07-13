<?php

namespace App\Exports;

use App\Models\FormLegal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormlegalExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormLegal::all();
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
            'Jumlah Legal',
            'Status',
            'Keterangan'
        ];
    }

    public function map($formlegal): array
    {
        return [
            $formlegal->id,
            $formlegal->prodi->prodi ?? 'N/A',  
            $formlegal->nama,
            $formlegal->nim,
            $formlegal->no_hp_mhs,
            $formlegal->email,
            $formlegal->keperluan,
            $formlegal->jumlah_legal,
            $formlegal->status,
            $formlegal->keterangan
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
            'A' => 5,
            'B' => 35,
            'C' => 35,
            'D' => 25,
            'E' => 25,
            'F' => 35,
            'G' => 45,
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

<?php

namespace App\Exports;

use App\Models\FormBukrim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormbukrimExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormBukrim::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama Dokumen',
            'Nama',
            'NIM',
            'Jenis Berkas',
            'Jumlah Dokumen'
        ];
    }

    public function map($formbukrim): array
    {
        return [
            $formbukrim->id,
            $formbukrim->prodi->prodi ?? 'N/A',
            $formbukrim->nama_dok,
            $formbukrim->nama,
            $formbukrim->nim,
            $formbukrim->jenis_berkas,
            $formbukrim->jumlah_dok,
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
            'D' => 35,
            'E' => 15,
            'F' => 30,
            'G' => 20,
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

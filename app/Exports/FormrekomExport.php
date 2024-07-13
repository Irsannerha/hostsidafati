<?php

namespace App\Exports;

use App\Models\FormRekom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormrekomExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormRekom::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIM',
            'Nomor HP Mahasiswa',
            'Instansi',
            'Alamat Instansi',
            'Jenis Rekomendasi',
            'Deskripsi',
            'Status',
            'Keterangan'
        ];
    }

    public function map($formrekom): array
    {
        return [
            $formrekom->id,
            $formrekom->prodi->prodi ?? 'N/A',
            $formrekom->nama,
            $formrekom->nim,
            $formrekom->no_hp_mhs,
            $formrekom->instansi,
            $formrekom->alamat_instansi,
            $formrekom->jerekom,
            $formrekom->deskripsi,
            $formrekom->status,
            $formrekom->keterangan,
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
            'F' => 50,
            'G' => 50,
            'H' => 20,
            'I' => 30,
            'J' => 15,
            'K' => 30,
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

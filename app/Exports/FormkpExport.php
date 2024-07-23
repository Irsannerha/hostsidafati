<?php

namespace App\Exports;

use App\Models\FormKP;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormkpExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormKP::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIM',
            'Instansi',
            'Alamat Instansi',
            'TJP',
            'Waktu Mulai Pelaksanaan',
            'Waktu Akhir Pelaksanaan',
            'Nomor HP Mahasiswa',
            'Email',
            'Status',
            'Keterangan'
        ];
    }

    public function map($formkp): array
    {
        return [
            $formkp->id,
            $formkp->prodi->prodi ?? 'N/A',
            $formkp->nama,
            $formkp->nim,
            $formkp->instansi,
            $formkp->alamat_instansi,
            $formkp->tjp,
            $formkp->waktu_mulai_pelaksanaan,
            $formkp->waktu_akhir_pelaksanaan,
            $formkp->no_hp_mhs,
            $formkp->email,
            $formkp->status,
            $formkp->keterangan,
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
            'E' => 45,
            'F' => 45,
            'G' => 25,
            'H' => 30,
            'I' => 30,
            'J' => 30,
            'K' => 30,
            'L' => 30,
            'M' => 30,
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

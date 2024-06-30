<?php

namespace App\Exports;

use App\Models\Taslab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TaslabExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2;

    public function collection()
    {
        return Taslab::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Unit Kerja',
            'Pendidikan',
            'TMT',
            'Status Pegawai',
            'Jabatan',
            'Bagian Tugas',
            'NITK',
            'Tanggal Lahir',
            'No HP',
            'Email',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($taslab): array
    {
        return [
            $taslab->id,
            $taslab->nama,
            $taslab->unit_kerja,
            $taslab->pendidikan,
            $taslab->tmt,
            $taslab->status_pegawai,
            $taslab->jabatan,
            $taslab->bagian_tugas,
            "'" . $taslab->nitk,
            $taslab->tgl_lahir,
            $taslab->no_hp,
            $taslab->email,
            $taslab->created_at,
            $taslab->updated_at,
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
            'C' => 20,
            'D' => 20,
            'E' => 15,
            'F' => 20,
            'G' => 35,
            'H' => 45,
            'I' => 30,
            'J' => 15,
            'K' => 20,
            'L' => 40,
            'M' => 20,
            'N' => 20,
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

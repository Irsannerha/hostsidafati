<?php

namespace App\Exports;

use App\Models\Pejabat;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PejabatExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    public function collection()
    {
        return Pejabat::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'NIP',
            'Pangkat Golongan',
            'Jabatan',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($pejabat): array
    {
        return [
            $pejabat->id,
            $pejabat->nama,
            "'" . $pejabat->nip,
            $pejabat->pangkat_golongan,
            $pejabat->jabatan,
            $pejabat->created_at,
            $pejabat->updated_at,
        ];
    } 

    public function styles($sheet)
    {
        return [
            // Style the first row as bold and with a background color
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
            'A' =>  5,
            'B' => 30,
            'C' => 45,
            'D' => 30,
            'E' => 55,
            'F' => 30,
            'G' => 30,
        ];
    }
}

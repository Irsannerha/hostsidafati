<?php

namespace App\Exports;

use App\Models\Lulus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LulusExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lulus::with(['prodi', 'tahun'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Tahun Akademik',
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($lulus): array
    {
        return [
            $lulus->id,
            $lulus->prodi->prodi ?? 'N/A',
            $lulus->tahun->ts ?? 'N/A',
            $lulus->januari,
            $lulus->februari,
            $lulus->maret,
            $lulus->april,
            $lulus->mei,
            $lulus->juni,
            $lulus->juli,
            $lulus->agustus,
            $lulus->september,
            $lulus->oktober,
            $lulus->november,
            $lulus->desember,
            $lulus->created_at,
            $lulus->updated_at,
        ];
    }

    public function styles($sheet)
    {
        return [
            // Style the first row as bold and with a background color
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['argb' => '1b3133'],
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 35,
            'C' => 17,
            'D' => 10,
            'E' => 10,
            'F' => 7,
            'G' => 7,
            'H' => 7,
            'I' => 7,
            'J' => 8,
            'K' => 11,
            'L' => 11,
            'M' => 11,
            'N' => 11,
            'O' => 11,
            'P' => 25,
            'Q' => 25,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // You can add additional logic here if needed
            },
        ];
    }
}

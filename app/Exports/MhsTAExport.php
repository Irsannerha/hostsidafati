<?php

namespace App\Exports;

use App\Models\MhsTA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MhsTAExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MhsTA::with(['prodi', 'tahun'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Tahun Akademik',
            'Mahasiswa Tugas Akhir',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($MhsTA): array
    {
        return [
            $MhsTA->id,
            $MhsTA->prodi->prodi ?? 'N/A',
            $MhsTA->tahun->ts ?? 'N/A',
            $MhsTA->mhs_ta,
            $MhsTA->created_at,
            $MhsTA->updated_at,
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
            'C' => 20,
            'D' => 23,
            'E' => 20,
            'F' => 20,
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

<?php

namespace App\Exports;

use App\Models\Wafat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class WafatExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Wafat::with(['prodi', 'tahun'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Tahun Akademik',
            'Mahasiswa Wafat Genap',
            'Mahasiswa Wafat Ganjil',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($wafat): array
    {
        return [
            $wafat->id,
            $wafat->prodi->prodi ?? 'N/A',
            $wafat->tahun->ts ?? 'N/A',
            $wafat->mhs_wafat_genap,
            $wafat->mhs_wafat_ganjil,
            $wafat->created_at,
            $wafat->updated_at,
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
            'D' => 35,
            'E' => 35,
            'F' => 20,
            'G' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Any additional styling or events can be handled here.
            },
        ];
    }
}

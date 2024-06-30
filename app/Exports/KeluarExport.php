<?php

namespace App\Exports;

use App\Models\Keluar;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class KeluarExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Keluar::with(['prodi', 'tahun'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Tahun Akademik',
            'Jumlah Mahasiswa Keluar Genap',
            'Jumlah Mahasiswa Keluar Ganjil',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($keluar): array
    {
        return [
            $keluar->id,
            $keluar->prodi->prodi ?? 'N/A',
            $keluar->tahun->ts ?? 'N/A',
            $keluar->mhs_keluar_genap,
            $keluar->mhs_keluar_ganjil,
            $keluar->created_at,
            $keluar->updated_at,
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
                // $event->sheet->getDelegate()->getStyle('A1:G1')->getAlignment()->setHorizontal('center');
            },
        ];
    }
}

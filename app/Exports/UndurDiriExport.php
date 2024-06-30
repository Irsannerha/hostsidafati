<?php

namespace App\Exports;

use App\Models\UndurDiri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UndurDiriExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2;

    public function collection()
    {
        return UndurDiri::with(['prodi', 'tahun'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Tahun',
            'Mahasiswa Undur Diri Genap',
            'Mahasiswa Undur Diri Ganjil',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($undurDiri): array
    {
        return [
            $undurDiri->id,
            $undurDiri->prodi->prodi ?? 'N/A',
            $undurDiri->tahun->ts ?? 'N/A',
            $undurDiri->mhs_undur_diri_genap,
            $undurDiri->mhs_undur_diri_ganjil,
            $undurDiri->created_at,
            $undurDiri->updated_at,
        ];
    }

    public function styles(Worksheet $sheet)
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
            AfterSheet::class => function (AfterSheet $event) {
                // Any additional styling or events can be handled here.
            },
        ];
    }
}

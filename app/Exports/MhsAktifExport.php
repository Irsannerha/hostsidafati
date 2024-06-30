<?php

namespace App\Exports;

use App\Models\MhsAktif;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MhsAktifExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2;

    public function collection()
    {
        return MhsAktif::with(['prodi', 'tahun'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Tahun Akademik',
            'Jumlah Mahasiswa Aktif TS',
            'Jumlah Mahasiswa Aktif TH',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($mhsAktif): array
    {
        return [
            $mhsAktif->id,
            $mhsAktif->prodi->prodi ?? 'N/A',
            $mhsAktif->tahun->ts ?? 'N/A',
            $mhsAktif->jumlah_mhs_aktif_ts,
            $mhsAktif->jumlah_mhs_aktif_th,
            $mhsAktif->created_at,
            $mhsAktif->updated_at,
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
            AfterSheet::class => function(AfterSheet $event) {
                // You can add additional logic here if needed
            },
        ];
    }
}

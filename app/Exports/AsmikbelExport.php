<?php

namespace App\Exports;

use App\Models\Asmikbel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AsmikbelExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    public function collection()
    {
        return Asmikbel::with('prodi')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIP/NRK',
            'Status',
            'Studi Lanjut',
            'Beasiswa',
            'Mulai Tubel',
            'Selesai Tubel',
            'SK Tubel',
            'Status Asmik',
            'Keterangan',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($asmikbel): array
    {
        return [
            $asmikbel->id,
            $asmikbel->prodi->prodi ?? 'N/A',
            $asmikbel->nama,
            "'" . $asmikbel->nip_nrk,
            $asmikbel->status,
            $asmikbel->studi_lanjut,
            $asmikbel->beasiswa,
            $asmikbel->mulai_tubel,
            $asmikbel->selesai_tubel,
            $asmikbel->sk_tubel,
            $asmikbel->status_asmik,
            $asmikbel->keterangan,
            $asmikbel->created_at,
            $asmikbel->updated_at,
        ];
    }

    public function styles($sheet)
    {
        return [
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
            'A' => 5,
            'B' => 35,
            'C' => 35,
            'D' => 30,
            'E' => 20,
            'F' => 80,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 15,
            'K' => 20,
            'L' => 30,
            'M' => 20,
            'N' => 20,
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\FormTA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormtaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormTA::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIM',
            'Keperluan',
            'Instansi',
            'Alamat Instansi',
            'TJP',
            'Pelaksanaan',
            'Waktu Mulai Pelaksanaan',
            'Waktu Akhir Pelaksanaan',
            'Nomor HP',
            'Email',
            'Nama Pembimbing Satu',
            'Nama Pembimbing Dua',
            'Judul',
            'Status',
            'Keterangan'
        ];
    }

    public function map($formta): array
    {
        return [
            $formta->id,
            $formta->prodi->prodi ?? 'N/A',
            $formta->nama,
            $formta->nim,
            $formta->keperluan,
            $formta->instansi,
            $formta->alamat_instansi,
            $formta->tjp,
            $formta->pelaksanaan,
            $formta->waktu_mulai_pelaksanaan,
            $formta->waktu_akhir_pelaksanaan,
            $formta->no_hp,
            $formta->email,
            $formta->nama_pembimbing_satu,
            $formta->nama_pembimbing_dua,
            $formta->judul,
            $formta->status,
            $formta->keterangan,
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
            'G' => 45,
            'H' => 30,
            'I' => 20,
            'J' => 30,
            'K' => 30,
            'L' => 20,
            'M' => 30,
            'N' => 30,
            'O' => 30,
            'P' => 50,
            'Q' => 25,
            'R' => 50,
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

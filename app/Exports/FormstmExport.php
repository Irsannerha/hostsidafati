<?php

namespace App\Exports;

use App\Models\FormSTM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormstmExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    public function collection()
    {
        return FormSTM::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIM',
            'Instansi',
            'Tanggal Balasan',
            'Tanggal Mulai Pelaksanaan',
            'Tanggal Akhir Pelaksanaan',
            'Jenis Surat Tugas',
            'Status',
            'Keterangan'
        ];
    }

    public function map($formstm): array
    {
        return [
            $formstm->id,
            $formstm->prodi->prodi ?? 'N/A',
            $formstm->nama,
            $formstm->nim,
            $formstm->instansi,
            $formstm->tgl_bls,
            $formstm->tgl_mulai_pelaksanaan,
            $formstm->tgl_akhir_pelaksanaan,
            $formstm->jenis_surat_tugas,
            $formstm->status,
            $formstm->keterangan,
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
            'E' => 55,
            'F' => 20,
            'G' => 20,
            'H' => 30,
            'I' => 30,
            'J' => 15,
            'K' => 30,
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

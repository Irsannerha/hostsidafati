<?php

namespace App\Exports;

use App\Models\Kegiatan;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class KegiatanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2; // Start from the second row

    public function collection()
    {
        return Kegiatan::with('prodi')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Email',
            'Nama Kegiatan',
            'Tanggal Kegiatan',
            'Mulai Kegiatan',
            'Akhir Kegiatan',
            'Tempat Pelaksanaan',
            'Jumlah Peserta',
            'Penanggung Jawab',
            'Nama Pemohon',
            'No HP',
            'Status',
            'Keterangan',
            'Surat Izin',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($kegiatan): array
    {
        return [
            $kegiatan->id,
            $kegiatan->prodi->prodi ?? 'N/A',
            $kegiatan->email,
            $kegiatan->nama_kegiatan,
            $kegiatan->tgl_kegiatan,
            $kegiatan->mulai_kegiatan,
            $kegiatan->akhir_kegiatan,
            $kegiatan->tempat_pelaksanaan,
            $kegiatan->jumlah_peserta,
            $kegiatan->penanggung_jawab,
            $kegiatan->nama_pemohon,
            $kegiatan->no_hp,
            $kegiatan->status,
            $kegiatan->keterangan,
            $kegiatan->surat_izin,
            $kegiatan->created_at,
            $kegiatan->updated_at,
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
            'C' => 60,
            'D' => 60,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 50,
            'I' => 17,
            'J' => 35,
            'K' => 35,
            'L' => 15,
            'M' => 15,
            'N' => 35,
            'O' => 15,
            'P' => 20,
            'Q' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $kegiatanCollection = Kegiatan::all();

                foreach ($kegiatanCollection as $index => $kegiatan) {
                    if ($kegiatan->surat_izin) {
                        // Set surat izin as hyperlink to open in new tab
                        $event->sheet->setCellValue('O' . ($index + $this->rowIndex), 'Surat Izin');
                        $suratIzinPath = 'assets/surat_izin/' . basename($kegiatan->surat_izin);
                        $event->sheet->getCell('O' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset($suratIzinPath));
                    }
                }
            }
        ];
    }
}

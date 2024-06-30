<?php

namespace App\Exports;

use App\Models\Prestasi;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PrestasiExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2; // Start from the second row for images

    public function collection()
    {
        return Prestasi::with('prodi')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama Tim',
            'Nama Mahasiswa',
            'NIM',
            'Kontak',
            'Jenis Prestasi',
            'Jumlah Peserta',
            'Kategori Olahraga',
            'Tahun Kegiatan',
            'URL Penyelenggara',
            'Nama Penyelenggara',
            'Tanggal Kegiatan',
            'Tingkat Kejuaraan',
            'Judul Karya',
            'Anggota Karya',
            'Foto',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }

    public function map($prestasi): array
    {
        $fotoUrls = [];
        if ($prestasi->foto) {
            $fotoPaths = json_decode($prestasi->foto, true);
            foreach ($fotoPaths as $fotoPath) {
                $fotoUrls[] = asset('assets/foto/' . $fotoPath);
            }
        }

        return [
            $prestasi->id,
            $prestasi->prodi->prodi ?? 'N/A',
            $prestasi->nama_tim,
            $prestasi->nama_mahasiswa,
            $prestasi->nim,
            $prestasi->kontak,
            $prestasi->jenis_prestasi,
            $prestasi->jumlah_peserta,
            $prestasi->kategori_olahraga,
            $prestasi->tahun_kegiatan,
            $prestasi->url_penyelenggara,
            $prestasi->nama_penyelenggara,
            $prestasi->tgl_kegiatan,
            $prestasi->tingkat_kejuaraan,
            $prestasi->judul_karya,
            $prestasi->anggota_karya,
            implode(', ', $fotoUrls),
            $prestasi->created_at,
            $prestasi->updated_at,
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
            'C' => 35,
            'D' => 35,
            'E' => 35,
            'F' => 35,
            'G' => 35,
            'H' => 17,
            'I' => 35,
            'J' => 15,
            'K' => 35,
            'L' => 35,
            'M' => 35,
            'N' => 35,
            'O' => 55,
            'P' => 55,
            'Q' => 15,
            'R' => 35,
            'S' => 35,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Add hyperlinks for photos
                $prestasiCollection = Prestasi::with('prodi')->get();
                foreach ($prestasiCollection as $index => $prestasi) {
                    if ($prestasi->foto) {
                        $event->sheet->setCellValue('Q' . ($index + $this->rowIndex), 'Foto');
                        $fotoPaths = json_decode($prestasi->foto, true);
                        foreach ($fotoPaths as $key => $fotoPath) {
                            $fotoUrl = asset('assets/foto/' . $fotoPath);
                            $event->sheet->getCell('Q' . ($index + $this->rowIndex))->getHyperlink()->setUrl($fotoUrl);
                            // You can also set the display text for the hyperlink, if needed
                            // $event->sheet->getCell('Q' . ($index + $this->rowIndex))->setValue('Foto ' . ($key + 1));
                        }
                    }
                }
            }
        ];
    }
}

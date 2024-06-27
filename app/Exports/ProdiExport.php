<?php

namespace App\Exports;

use App\Models\Prodi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ProdiExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2; // Start from the second row for images

    public function collection()
    {
        return Prodi::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Foto',
            'SK Prodi',
            'Email',
            'Kapro',
            'Fakultas',
            'Akreditasi',
            'Prodik',
            'Jumlah Mahasiswa',
            'Tanggal Pendirian',
            'Deskripsi',
            'Jumlah Dosen',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($prodi): array
    {
        return [
            $prodi->id,
            $prodi->prodi,
            '', // Placeholder for foto
            $prodi->sk_prodi ? asset('assets/sk_prodi/' . $prodi->sk_prodi) : '', // URL to SK Prodi if exists
            $prodi->email,
            $prodi->kapro,
            $prodi->fakultas,
            $prodi->akreditasi,
            $prodi->prodik,
            $prodi->jumlah_mahasiswa,
            $prodi->tgl_pendirian,
            $prodi->deskripsi,
            $prodi->jumlah_dosen,
            $prodi->created_at,
            $prodi->updated_at,
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
            'A' =>  5,
            'B' => 42,
            'C' => 10,
            'D' => 10,
            'E' => 40,
            'F' => 40,
            'G' => 40,
            'H' => 10,
            'I' => 11,
            'J' => 17,
            'K' => 20,
            'L' => 50,
            'M' => 15,
            'N' => 20,
            'O' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Add images for foto
                $prodiCollection = Prodi::all();
                foreach ($prodiCollection as $index => $prodi) {
                    if ($prodi->foto) {
                        // Set foto as hyperlink to open in new tab
                        $event->sheet->setCellValue('C' . ($index + $this->rowIndex), 'Foto');
                        $event->sheet->getCell('C' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('storage/' . $prodi->foto));
                    }

                    if ($prodi->sk_prodi) {
                        // Set SK Prodi as hyperlink to open in new tab
                        $event->sheet->setCellValue('D' . ($index + $this->rowIndex), 'SK Prodi');
                        $event->sheet->getCell('D' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_prodi/' . $prodi->sk_prodi));
                    }
                }
            }
        ];
    }
}

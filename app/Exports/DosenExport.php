<?php

namespace App\Exports;

use App\Models\Dosen;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DosenExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithEvents
{
    private $rowIndex = 2; // Start from the second row for images

    public function collection()
    {
        return Dosen::with('prodi')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Prodi',
            'Nama',
            'NIP/NRK',
            'Tanggal Lahir',
            'Pendidikan',
            'Status NIDN/NIDK/NUP',
            'Status Pegawai',
            'Jabatan Fungsional',
            'TMT Jabfung Terakhir',
            'Target Kenaikan Jabfung',
            'TMT Masuk ITERA',
            'TMT',
            'Pekerti',
            'Serdos',
            'Status Dosen',
            'SK PNS',
            'SK CPNS',
            'SK Tubel',
            'SK Perpanjangan Tubel',
            'SK Jabfung',
            'SK Pengaktifan',
            'SK Pengaktifan Kembali',
            'Dibuat Pada',
            'Diperbarui Pada'
        ];
    }

    public function map($dosen): array
    {
        return [
            $dosen->id,
            $dosen->prodi->prodi ?? 'N/A',
            $dosen->nama,
            "'" . $dosen->nip_nrk,
            $dosen->tgl_lahir,
            $dosen->pendidikan,
            $dosen->status_nidn_nidk,
            $dosen->status_pegawai,
            $dosen->jabfung,
            $dosen->tmt_jabfung_terakhir,
            $dosen->target_kenaikan_jabfung,
            $dosen->tmt_masuk_itera,
            $dosen->tmt,
            $dosen->pekerti,
            $dosen->serdos,
            $dosen->status_dosen,
            $dosen->sk_pns ? asset('assets/sk_pns/' . $dosen->sk_pns) : '',
            $dosen->sk_cpns ? asset('assets/sk_cpns/' . $dosen->sk_cpns) : '',
            $dosen->sk_tubel ? asset('assets/sk_tubel/' . $dosen->sk_tubel) : '',
            $dosen->sk_perpanjangan_tubel ? asset('assets/sk_perpanjangan_tubel/' . $dosen->sk_perpanjangan_tubel) : '',
            $dosen->sk_jabfung ? asset('assets/sk_jabfung/' . $dosen->sk_jabfung) : '',
            $dosen->sk_pengaktifan ? asset('assets/sk_pengaktifan/' . $dosen->sk_pengaktifan) : '',
            $dosen->sk_pengaktifan_kembali ? asset('assets/sk_pengaktifan_kembali/' . $dosen->sk_pengaktifan_kembali) : '',
            $dosen->created_at,
            $dosen->updated_at,
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
            'B' => 35,
            'C' => 40,
            'D' => 30,
            'E' => 15,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 20,
            'K' => 20,
            'L' => 20,
            'M' => 20,
            'N' => 10,
            'O' => 10,
            'P' => 20,
            'Q' => 20,
            'R' => 20,
            'S' => 20,
            'T' => 20,
            'U' => 20,
            'V' => 20,
            'W' => 20,
            'X' => 20,
            'Y' => 20,
            'Z' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Add hyperlinks for SK files
                $dosenCollection = Dosen::all();
                foreach ($dosenCollection as $index => $dosen) {
                    if ($dosen->sk_pns) {
                        $event->sheet->setCellValue('Q' . ($index + $this->rowIndex), 'SK PNS');
                        $event->sheet->getCell('Q' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_pns/' . $dosen->sk_pns));
                    }
                    if ($dosen->sk_cpns) {
                        $event->sheet->setCellValue('R' . ($index + $this->rowIndex), 'SK CPNS');
                        $event->sheet->getCell('R' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_cpns/' . $dosen->sk_cpns));
                    }
                    if ($dosen->sk_tubel) {
                        $event->sheet->setCellValue('S' . ($index + $this->rowIndex), 'SK Tubel');
                        $event->sheet->getCell('S' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_tubel/' . $dosen->sk_tubel));
                    }
                    if ($dosen->sk_perpanjangan_tubel) {
                        $event->sheet->setCellValue('T' . ($index + $this->rowIndex), 'SK Perpanjangan Tubel');
                        $event->sheet->getCell('T' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_perpanjangan_tubel/' . $dosen->sk_perpanjangan_tubel));
                    }
                    if ($dosen->sk_jabfung) {
                        $event->sheet->setCellValue('U' . ($index + $this->rowIndex), 'SK Jabfung');
                        $event->sheet->getCell('U' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_jabfung/' . $dosen->sk_jabfung));
                    }
                    if ($dosen->sk_pengaktifan) {
                        $event->sheet->setCellValue('V' . ($index + $this->rowIndex), 'SK Pengaktifan');
                        $event->sheet->getCell('V' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_pengaktifan/' . $dosen->sk_pengaktifan));
                    }
                    if ($dosen->sk_pengaktifan_kembali) {
                        $event->sheet->setCellValue('W' . ($index + $this->rowIndex), 'SK Pengaktifan Kembali');
                        $event->sheet->getCell('W' . ($index + $this->rowIndex))->getHyperlink()->setUrl(asset('assets/sk_pengaktifan_kembali/' . $dosen->sk_pengaktifan_kembali));
                    }
                }
            }
        ];
    }
}

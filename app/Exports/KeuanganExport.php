<?php

namespace App\Exports;

use App\Models\Keuangan;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KeuanganExport implements FromQuery, WithHeadings, WithMapping, WithStyles
{
    protected $start_date;
    protected $end_date;
    protected $JenisLaporan;

    public function __construct($start_date, $end_date, $JenisLaporan)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->JenisLaporan = $JenisLaporan;
    }

    public function query()
    {
        return Keuangan::query()
            ->Where('Jenis', $this->JenisLaporan)
            ->whereBetween('TanggalPengeluaran', [$this->start_date, $this->end_date]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jenis',
            'Jumlah (Rp)',
            'Tanggal',
            'Keterangan',
        ];
    }

    public function map($pengeluaran): array
    {
        return [
            $pengeluaran->NamaPengeluaran,
            $pengeluaran->Jenis,
            number_format($pengeluaran->JumlahPengeluaran, 0, ',', '.'),
            $pengeluaran->TanggalPengeluaran,
            $pengeluaran->Keterangan,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // Tambahkan border ke seluruh area data
        $sheet->getStyle("A1:E$lastRow")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Header bold dan warna background
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFD700'],  // Warna emas
            ],
        ]);

        // Tambahkan border tebal untuk total di baris terakhir
        $sheet->getStyle("A$lastRow:E$lastRow")->applyFromArray([
            'font' => ['bold' => true],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                ],
            ],
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{
    protected $jenisKelamin;
    protected $usiaMin;
    protected $usiaMax;

    public function __construct($jenisKelamin, $usiaMin, $usiaMax)
    {
        $this->jenisKelamin = $jenisKelamin;
        $this->usiaMin = $usiaMin;
        $this->usiaMax = $usiaMax;
    }

    public function collection()
    {
        $query = User::query();

        if ($this->jenisKelamin) {
            $query->where('jenis_kelamin', $this->jenisKelamin);
        }

        if ($this->usiaMin && $this->usiaMax) {
            $minDate = Carbon::now()->subYears($this->usiaMax)->format('Y-m-d');
            $maxDate = Carbon::now()->subYears($this->usiaMin)->format('Y-m-d');
            $query->whereBetween('tanggal_lahir', [$minDate, $maxDate]);
        }

        return $query->get([
            'kub', 'no_kk', 'alamat', 'nomor_telepon', 'jenis_kelamin', 'tanggal_lahir',
            'nik', 'nama_ayah', 'nama_ibu', 'jumlah_anggota_keluarga', 'status_dalam_keluarga', 'baptis', 'tanggal_baptis',
            'sidi', 'janda_duda', 'yatim', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota_kabupaten', 'provinsi', 'kode_pos',
            'tempat_lahir', 'status_perkawinan', 'tanggal_mikah', 'agama', 'suku', 'pekerjaan', 'penghasilan', 'pendidikan_terakhir', 'instansi'
        ]);
    }

    public function headings(): array
    {
        return [
            'KUB', 'No KK', 'Alamat', 'Telepon', 'Jenis Kelamin', 'Tanggal Lahir',
            'NIK', 'Nama Ayah', 'Nama Ibu', 'Jumlah Anggota Keluarga', 'Status Dalam Keluarga', 'Baptis', 'Tanggal Baptis',
            'Sidi', 'Janda/Duda', 'Yatim', 'RT', 'RW', 'Kelurahan', 'Kecamatan', 'Kota/Kabupaten', 'Provinsi', 'Kode Pos',
            'Tempat Lahir', 'Status Perkawinan', 'Tanggal Nikah', 'Agama', 'Suku', 'Pekerjaan', 'Penghasilan', 'Pendidikan Terakhir', 'Instansi'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle('A1:AI' . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('A1:AI1')->getFont()->setBold(true);
    }
}

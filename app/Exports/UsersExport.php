<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Font;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    private $rowNumber = 1;

    public function collection()
    {
        return User::where('level', 'PERSONEL')->get();
    }

    public function headings(): array
    {
        return [
            'NOMOR',
            'NRP',
            'NAMA LENGKAP',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'PANGKAT',
            'JABATAN',
            'NO-KEPUTUSAN JABATAN',
            'NO SPRIN JABATAN',
            'TMT JABATAN',
            'TMT TNI',
            'TMT BA/TA',
            'DAPEN',
            'UPT PTJS',
            'SAMAPTA',
            'E-MAIL',
            'NOMOR PONSEL',
            'DATA DI BUAT TANGGAL',
            'DATA DI UPDATE TANGGAL',
         
        ];
    }

    public function map($user): array
    {
        return [
            $this->rowNumber++,
            $user->nrp,
            $user->nama,
            $user->tempat_lahir,
            $user->tanggal_lahir,
            $user->refPangkat->nama,
            $user->jabatan,
            $user->no_kep_jabatan,
            $user->no_sprin_jab,
            $user->tmt_jabatan,
            $user->tmt_tni,
            $user->tmt_ba_ta,
            $user->dapen,
            $user->upt_ptj,
            $user->samapta,
            $user->email,
            $user->telephone,
            $user->created_at,
            $user->updated_at,
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:S1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
            },
        ];
    }
}

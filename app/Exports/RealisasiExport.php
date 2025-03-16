<?php

namespace App\Exports;

use App\Models\Realisasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RealisasiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    private $rowNumber = 1;

    public function collection()
    {
        return Realisasi::all();
    }
    public function headings(): array
    {
        return [
            'NOMOR',
            'PROGRAM KERJA',

            'JANUARI',
            'FEBRUARI',
            'MARET',
            'APRIL',
            'MEI',
            'JUNI',
            'JULI',
            'AGUSTUS',
            'SEPTEMBER',
            'OKTOBER',
            'NOVEMBER',
            'DESEMBER'
        ];

    }
    public function map($realisasi): array
    {
        return [
            $this->rowNumber++,
            $realisasi->subsProgram->nama,

            $realisasi->januari,
            $realisasi->februari,
            $realisasi->maret,
            $realisasi->april,
            $realisasi->mei,
            $realisasi->juni,
            $realisasi->juli,
            $realisasi->agustus,
            $realisasi->september,
            $realisasi->oktober,
            $realisasi->november,
            $realisasi->desember

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

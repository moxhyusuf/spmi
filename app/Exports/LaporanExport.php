<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function view(): View
    {
        return view('laporan.excel', [
            'pelaksanaan' => $this->result['pelaksanaan'],
            'tanggalMulai' => $this->result['tanggalMulai'],
            'tanggalSelesai' => $this->result['tanggalSelesai'],
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');

        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 18,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        $sheet->getStyle('A2:F2')->applyFromArray([
            'font' => [
                'italic' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        $sheet->getStyle('A4:G4')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'FFFFFF',
                ],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'rgb' => '198754',
                ],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        $sheet->getStyle("A4:F{$lastRow}")
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle('thin');

        $sheet->getStyle("A5:A{$lastRow}")
            ->getAlignment()
            ->setHorizontal('center');

        $sheet->getStyle("C5:C{$lastRow}")
            ->getAlignment()
            ->setHorizontal('center');

        $sheet->getStyle("F5:F{$lastRow}")
            ->getAlignment()
            ->setHorizontal('center');

        return [];
    }
}

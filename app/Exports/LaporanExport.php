<?php

namespace App\Exports;

use App\Models\Pelaksanaan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $tanggalMulai = $this->request->tanggal_mulai
            ? Carbon::parse($this->request->tanggal_mulai)
            : now()->subMonth();

        $tanggalSelesai = $this->request->tanggal_selesai
            ? Carbon::parse($this->request->tanggal_selesai)
            : now();

        $query = Pelaksanaan::with('indikator.standar')
            ->whereBetween('tanggal', [
                $tanggalMulai->format('Y-m-d'),
                $tanggalSelesai->format('Y-m-d')
            ]);

        if ($this->request->filled('prodi')) {
            $query->where('prodi', $this->request->prodi);
        }

        return view('laporan.excel', [
            'pelaksanaans' => $query->latest()->get(),
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
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

        $sheet->getStyle('A4:F4')->applyFromArray([
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

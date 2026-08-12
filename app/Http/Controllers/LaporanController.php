<?php

namespace App\Http\Controllers;

use App\Models\Pelaksanaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Exports\LaporanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request): View
    {
        $result = $this->getFilteredData($request);

        return view('laporan.index', [
            'pelaksanaan' => $result['pelaksanaan'],
            'tanggalMulai' => $result['tanggalMulai'],
            'tanggalSelesai' => $result['tanggalSelesai'],
        ]);
    }

    private function getFilteredData(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai ? Carbon::parse($request->tanggal_mulai) : now()->subMonth();
        $tanggalSelesai = $request->tanggal_selesai ? Carbon::parse($request->tanggal_selesai) : now();
        $unit = $request->unit ? $request->unit : null;

        $query = Pelaksanaan::with('indikator.standar')
            ->whereBetween('tanggal', [
                $tanggalMulai->format('Y-m-d'),
                $tanggalSelesai->format('Y-m-d')
            ]);

        if ($request->filled('prodi')) {
            $query->where('prodi', $request->prodi);
        }

        if ($unit) {
            $query->whereHas('indikator', function ($q) use ($unit) {
                $q->where('unit', $unit);
            });
        }

        $pelaksanaan = $query->latest()->get();

        return [
            'pelaksanaan' => $pelaksanaan,
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
        ];
    }

    public function exportPdf(Request $request)
    {
        $result = $this->getFilteredData($request);

        $pdf = Pdf::loadView('laporan.pdf', [
            'pelaksanaan' => $result['pelaksanaan'],
            'tanggalMulai' => $result['tanggalMulai'],
            'tanggalSelesai' => $result['tanggalSelesai'],
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-pelaksanaan.pdf');
    }

    public function exportExcel(Request $request)
    {
        $result = $this->getFilteredData($request);
        return Excel::download(new LaporanExport($result), 'laporan-pelaksanaan.xlsx');
    }
}

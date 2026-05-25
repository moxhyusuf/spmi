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
        $tanggalMulai = $request->tanggal_mulai
            ? Carbon::parse($request->tanggal_mulai)
            : now()->subMonth();

        $tanggalSelesai = $request->tanggal_selesai
            ? Carbon::parse($request->tanggal_selesai)
            : now();

        $query = Pelaksanaan::with('indikator.standar')
            ->whereBetween('tanggal', [
                $tanggalMulai->format('Y-m-d'),
                $tanggalSelesai->format('Y-m-d')
            ]);

        if ($request->filled('prodi')) {
            $query->where('prodi', $request->prodi);
        }

        $pelaksanaans = $query->latest()->get();

        $sistemInformasi = $pelaksanaans
            ->where('prodi', 'Sistem Informasi');

        $teknologiInformasi = $pelaksanaans
            ->where('prodi', 'Teknologi Informasi');

        $sistemInformasiAkuntansi = $pelaksanaans
            ->where('prodi', 'Sistem Informasi Akuntansi');

        return view('laporan.index', compact(
            'sistemInformasi',
            'teknologiInformasi',
            'sistemInformasiAkuntansi',
            'tanggalMulai',
            'tanggalSelesai'
        ));
    }

    private function getFilteredData(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai
            ? Carbon::parse($request->tanggal_mulai)
            : now()->subMonth();

        $tanggalSelesai = $request->tanggal_selesai
            ? Carbon::parse($request->tanggal_selesai)
            : now();

        $query = Pelaksanaan::with('indikator.standar')
            ->whereBetween('tanggal', [
                $tanggalMulai->format('Y-m-d'),
                $tanggalSelesai->format('Y-m-d')
            ]);

        if ($request->filled('prodi')) {
            $query->where('prodi', $request->prodi);
        }

        return [
            'data' => $query->latest()->get(),
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
        ];
    }

    public function exportPdf(Request $request)
    {
        $result = $this->getFilteredData($request);

        $pdf = Pdf::loadView('laporan.pdf', [
            'pelaksanaans' => $result['data'],
            'tanggalMulai' => $result['tanggalMulai'],
            'tanggalSelesai' => $result['tanggalSelesai'],
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-pelaksanaan.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(
            new LaporanExport($request),
            'laporan-pelaksanaan.xlsx'
        );
    }
}

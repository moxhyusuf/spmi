<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Pelaksanaan;
use App\Models\Standar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $totalStandar = Standar::count();
        $totalIndikator = Indikator::count();
        $totalPelaksanaan = Pelaksanaan::count();

        $indikatorBelumTerlaksana = Indikator::doesntHave('pelaksanaan')->count();

        $pelaksanaanPerUnit = Pelaksanaan::join('indikator', 'pelaksanaan.indikator_id', '=', 'indikator.id')
            ->select('indikator.unit', DB::raw('count(*) as total'))
            ->groupBy('indikator.unit')
            ->orderByDesc('total')
            ->get();

        $pelaksanaanPerBulan = Pelaksanaan::select(
            DB::raw("DATE_FORMAT(tanggal, '%Y-%m') as bulan"),
            DB::raw('count(*) as total')
        )
            ->where('tanggal', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $pelaksanaanTerbaru = Pelaksanaan::with(['indikator.standar'])
            ->latest('tanggal')
            ->limit(5)
            ->get();

        $standarSummary = Standar::withCount('indikator')
            ->with(['indikator' => function ($q) {
                $q->withCount('pelaksanaan');
            }])
            ->get()
            ->map(function ($standar) {
                return [
                    'nama' => $standar->nama,
                    'total_indikator' => $standar->indikator_count,
                    'total_pelaksanaan' => $standar->indikator->sum('pelaksanaan_count'),
                ];
            });

        return view('dashboard.index', compact(
            'totalStandar',
            'totalIndikator',
            'totalPelaksanaan',
            'indikatorBelumTerlaksana',
            'pelaksanaanPerUnit',
            'pelaksanaanPerBulan',
            'pelaksanaanTerbaru',
            'standarSummary'
        ));
    }
}

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                    <p class="text-subtitle text-muted">Selamat datang di dashboard</p>
                </div>
            </div>
        </div>

        {{-- Statistik Cards --}}
        <section class="row">
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stats-icon purple mb-2">
                                    <i class="bi bi-journal-bookmark-fill"></i>
                                </div>
                            </div>
                            <div class="col-8 text-end">
                                <h6 class="text-muted font-semibold">Total Standar</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalStandar }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stats-icon blue mb-2">
                                    <i class="bi bi-list-check"></i>
                                </div>
                            </div>
                            <div class="col-8 text-end">
                                <h6 class="text-muted font-semibold">Total Indikator</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalIndikator }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stats-icon green mb-2">
                                    <i class="bi bi-clipboard-check-fill"></i>
                                </div>
                            </div>
                            <div class="col-8 text-end">
                                <h6 class="text-muted font-semibold">Total Pelaksanaan</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalPelaksanaan }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Charts --}}
        <section class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Pelaksanaan per Unit</h4>
                    </div>
                    <div class="card-body">
                        <div id="chartPerUnit"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Ringkasan Standar --}}
        <section class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Ringkasan per Standar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Standar</th>
                                        <th class="text-center">Indikator</th>
                                        <th class="text-center">Pelaksanaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($standarSummary as $item)
                                        <tr>
                                            <td>{{ $item['nama'] }}</td>
                                            <td class="text-center">{{ $item['total_indikator'] }}</td>
                                            <td class="text-center">{{ $item['total_pelaksanaan'] }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Belum ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pelaksanaan Terbaru --}}
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Pelaksanaan Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Indikator</th>
                                        <th>Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelaksanaanTerbaru as $item)
                                        <tr>
                                            <td>{{ $item->tanggal->format('d M Y') }}</td>
                                            <td>{{ $item->indikator->nama ?? '-' }}</td>
                                            <td>{{ $item->unit }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Belum ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Chart Pelaksanaan per Bulan
        const bulanData = @json($pelaksanaanPerBulan);
        const bulanLabels = bulanData.map(item => item.bulan);
        const bulanTotals = bulanData.map(item => item.total);

        new ApexCharts(document.querySelector("#chartPerBulan"), {
            chart: {
                type: 'area',
                height: 300,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Pelaksanaan',
                data: bulanTotals
            }],
            xaxis: {
                categories: bulanLabels
            },
            colors: ['#7239ea'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            }
        }).render();

        // Chart Pelaksanaan per Unit
        const unitData = @json($pelaksanaanPerUnit);
        const unitLabels = unitData.map(item => item.unit);
        const unitTotals = unitData.map(item => item.total);

        new ApexCharts(document.querySelector("#chartPerUnit"), {
            chart: {
                type: 'donut',
                height: 300
            },
            series: unitTotals,
            labels: unitLabels,
            legend: {
                position: 'bottom',
                fontSize: '12px'
            }
        }).render();
    </script>
@endpush

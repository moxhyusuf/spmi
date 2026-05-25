@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <div class="page-heading">

        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan Pelaksanaan</h3>
                    <p class="text-subtitle text-muted">
                        Laporan pelaksanaan indikator mutu
                    </p>
                </div>
            </div>
        </div>

        <section class="section">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end gap-2 mb-3">

                        <a href="{{ route('laporan.export.pdf', request()->query()) }}" class="btn btn-sm btn-danger">
                            Export PDF
                        </a>

                        <a href="{{ route('laporan.export.excel', request()->query()) }}" class="btn btn-sm btn-success">
                            Export Excel
                        </a>

                    </div>
                    <form action="{{ route('laporan.index') }}" method="GET">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>

                                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai', $tanggalMulai->format('Y-m-d')) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>

                                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ request('tanggal_selesai', $tanggalSelesai->format('Y-m-d')) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Program Studi</label>

                                    <select name="prodi" class="form-select">
                                        <option value="">Semua Program Studi</option>

                                        <option value="Sistem Informasi" @selected(request('prodi') == 'Sistem Informasi')>
                                            Sistem Informasi
                                        </option>

                                        <option value="Teknologi Informasi" @selected(request('prodi') == 'Teknologi Informasi')>
                                            Teknologi Informasi
                                        </option>

                                        <option value="Sistem Informasi Akuntansi" @selected(request('prodi') == 'Sistem Informasi Akuntansi')>
                                            Sistem Informasi Akuntansi
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    Filter
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            @php
                $tables = [
                    'Sistem Informasi' => [
                        'id' => 'table-si',
                        'data' => $sistemInformasi,
                    ],
                    'Teknologi Informasi' => [
                        'id' => 'table-ti',
                        'data' => $teknologiInformasi,
                    ],
                    'Sistem Informasi Akuntansi' => [
                        'id' => 'table-sia',
                        'data' => $sistemInformasiAkuntansi,
                    ],
                ];
            @endphp

            @foreach ($tables as $title => $table)
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ $title }}
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped" id="{{ $table['id'] }}">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Standar</th>
                                    <th>No IKU</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Dokumen</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($table['data'] as $pelaksanaan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $pelaksanaan->indikator->standar->nama }}
                                        </td>

                                        <td>
                                            {{ $pelaksanaan->indikator->no_iku }}
                                        </td>

                                        <td>
                                            {{ $pelaksanaan->keterangan }}
                                        </td>

                                        <td>
                                            {{ $pelaksanaan->tanggal }}
                                        </td>

                                        <td>
                                            <a href="{{ asset('storage/' . $pelaksanaan->dokumen) }}" target="_blank" class="btn btn-sm btn-info">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            @endforeach

        </section>

    </div>
@endsection

@push('js')
    <script>
        new simpleDatatables.DataTable("#table-si");
        new simpleDatatables.DataTable("#table-ti");
        new simpleDatatables.DataTable("#table-sia");
    </script>
@endpush

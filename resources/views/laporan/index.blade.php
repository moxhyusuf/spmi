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

                        <a href="{{ route('laporan.export.pdf', request()->query()) }}" class="btn btn-sm btn-danger" target="_blank">
                            Export PDF
                        </a>

                        <a href="{{ route('laporan.export.excel', request()->query()) }}" class="btn btn-sm btn-success" target="_blank">
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
                                    <label>Unit</label>
                                    <select name="unit" class="form-select">
                                        <option value="">Semua Unit</option>
                                        @foreach (\App\Models\Pelaksanaan::UNIT as $unit)
                                            <option value="{{ $unit }}" @selected(request('unit') == $unit)>
                                                {{ $unit }}
                                            </option>
                                        @endforeach
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

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Laporan Pelaksanaan Standar Mutu
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-striped" id="datatable">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Standar Mutu</th>
                                <th>Pernyataan Standar</th>
                                <th>Indikator Standar</th>
                                <th>Tanggal</th>
                                <th>Unit</th>
                                <th>Uraian Pelaksanaan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pelaksanaan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>({{ $item->indikator->standar->nomor }}) {{ $item->indikator->standar->nama }}</td>
                                    <td>{{ $item->indikator->pernyataan }}</td>
                                    <td>({{ $item->indikator->no_iku }}) {{ $item->indikator->nama }}</td>
                                    <td style="white-space: nowrap">{{ $item->tanggal->format('d-m-Y') }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->uraian }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

        </section>

    </div>
@endsection

@push('js')
    <script>
        new simpleDatatables.DataTable("#datatable");
    </script>
@endpush

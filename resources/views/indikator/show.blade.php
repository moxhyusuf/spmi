@extends('layouts.app')

@section('title', 'Detail Indikator - E-SPMI')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <a href="{{ route('indikator.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h1><i class="bi bi-target"></i> {{ $indikator->nama_indikator }}</h1>
        </div>
    </div>

    <div class="row">
        <!-- Detail Card -->
        <div class="col-lg-8 mb-4">
            <div class="card detail-card">
                <div class="card-header-custom">
                    <h5 class="mb-0"><i class="bi bi-info-circle"></i> Informasi Indikator</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label-custom">Standar</label>
                            <p class="form-value">
                                <strong>{{ $indikator->standar->nama_standar }}</strong>
                                <br>
                                <small class="text-muted">({{ $indikator->standar->kode_standar }})</small>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label-custom">Nama Indikator</label>
                            <p class="form-value">{{ $indikator->nama_indikator }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label-custom">Target</label>
                            <p class="form-value">
                                <span class="badge bg-light text-dark"
                                    style="font-size: 1rem;">{{ $indikator->target }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label-custom">Dibuat</label>
                            <p class="form-value">{{ $indikator->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Diperbarui</label>
                            <p class="form-value">{{ $indikator->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Card -->
        <div class="col-lg-4 mb-4">
            <div class="card stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon" style="background-color: #E8F5E9; color: #28A745;">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-value" style="color: #28A745;">{{ $indikator->implementasi->count() }}</div>
                    <div class="stat-label">Total Implementasi</div>
                </div>
            </div>

            <div class="card stat-card mt-3">
                <div class="stat-card-body">
                    <div class="stat-icon" style="background-color: #E8F5E9; color: #28A745;">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <div class="stat-value" style="color: #28A745;">
                        {{ $indikator->implementasi->where('status', 1)->count() }}</div>
                    <div class="stat-label">Implementasi Selesai</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Implementasi Table -->
    @if ($indikator->implementasi->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="datatable-container">
                    <h5 class="section-title">Implementasi Indikator Ini</h5>
                    <div class="table-responsive">
                        <table id="implementasiTable" class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 20%;">Nama Prodi</th>
                                    <th style="width: 20%;">Tanggal</th>
                                    <th style="width: 30%;">Keterangan</th>
                                    <th style="width: 15%;">Status</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($indikator->implementasi as $key => $impl)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $impl->user->name }}</strong></td>
                                        <td>{{ $impl->tanggal ? \Carbon\Carbon::parse($impl->tanggal)->format('d M Y') : '-' }}
                                        </td>
                                        <td>{{ Str::limit($impl->keterangan, 40) ?? '-' }}</td>
                                        <td>
                                            @if ($impl->status == 0)
                                                <span class="badge badge-proses"><i class="bi bi-clock-history"></i>
                                                    Proses</span>
                                            @else
                                                <span class="badge badge-selesai"><i class="bi bi-check-circle"></i>
                                                    Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('implementasi.show', $impl) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('extra-js')
    <script>
        $(document).ready(function() {
            @if ($indikator->implementasi->count() > 0)
                $('#implementasiTable').DataTable({
                    responsive: true,
                    autoWidth: false,
                    paging: false,
                    searching: false,
                    ordering: false
                });
            @endif
        });
    </script>
@endsection

@section('extra-css')
    <style>
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            padding: 1.25rem;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }

        .detail-card {
            background: white;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .form-label-custom {
            font-weight: 600;
            color: var(--primary-blue);
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .form-value {
            color: #333;
            font-size: 1rem;
            margin: 0 0 1rem 0;
            padding: 0.5rem;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 3px solid var(--primary-blue);
            padding-left: 1rem;
        }
    </style>
@endsection

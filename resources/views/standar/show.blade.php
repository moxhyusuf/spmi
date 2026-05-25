@extends('layouts.app')

@section('title', 'Detail Standar - E-SPMI')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <a href="{{ route('standar.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h1><i class="bi bi-file-earmark-text"></i> {{ $standar->nama_standar }}</h1>
        </div>
    </div>

    <div class="row">
        <!-- Detail Card -->
        <div class="col-lg-8 mb-4">
            <div class="card detail-card">
                <div class="card-header-custom">
                    <h5 class="mb-0"><i class="bi bi-info-circle"></i> Informasi Standar</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label-custom">Kode Standar</label>
                            <p class="form-value">{{ $standar->kode_standar }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Tahun</label>
                            <p class="form-value">{{ $standar->tahun }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label-custom">Kategori</label>
                            <p class="form-value">
                                <span class="badge bg-info">{{ $standar->kategori }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label-custom">Deskripsi</label>
                            <p class="form-value">{{ $standar->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label-custom">Dibuat</label>
                            <p class="form-value">{{ $standar->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Diperbarui</label>
                            <p class="form-value">{{ $standar->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Card -->
        <div class="col-lg-4 mb-4">
            <div class="card stat-card">
                <div class="stat-card-body">
                    <div class="stat-icon blue">
                        <i class="bi bi-target"></i>
                    </div>
                    <div class="stat-value">{{ $standar->indikator->count() }}</div>
                    <div class="stat-label">Total Indikator</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Indikator Table -->
    @if ($standar->indikator->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="datatable-container">
                    <h5 class="section-title">Indikator Standar Ini</h5>
                    <div class="table-responsive">
                        <table id="indikatorTable" class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 50%;">Nama Indikator</th>
                                    <th style="width: 20%;">Target</th>
                                    <th style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($standar->indikator as $key => $indikator)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $indikator->nama_indikator }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark">{{ $indikator->target }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('indikator.show', $indikator) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i> Lihat
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
            @if ($standar->indikator->count() > 0)
                $('#indikatorTable').DataTable({
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

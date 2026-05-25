@extends('layouts.app')

@section('title', 'Pelaksanaan')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pelaksanaan</h3>
                    <p class="text-subtitle text-muted">Daftar pelaksanaan indikator</p>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-end mb-3">
                        @if (auth()->user()->role === 'pic')
                            <a href="{{ route('pelaksanaan.create') }}" class="btn btn-primary">
                                Tambah Pelaksanaan
                            </a>
                        @endif
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Standar</th>
                                <th>No IKU</th>
                                <th>Prodi</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Dokumen</th>
                                @if (auth()->user()->role === 'pic')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pelaksanaans as $pelaksanaan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pelaksanaan->indikator->standar->nama }}</td>
                                    <td>{{ $pelaksanaan->indikator->no_iku }}</td>
                                    <td>{{ $pelaksanaan->prodi }}</td>
                                    <td>{{ $pelaksanaan->tanggal }}</td>
                                    <td>{{ $pelaksanaan->keterangan }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $pelaksanaan->dokumen) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                            Lihat
                                        </a>
                                    </td>
                                    @if (auth()->user()->role === 'pic')
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('pelaksanaan.edit', $pelaksanaan->id) }}" class="btn btn-sm btn-outline-warning">
                                                    Edit
                                                </a>

                                                <form action="{{ route('pelaksanaan.destroy', $pelaksanaan->id) }}" method="POST" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
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
        let datatable = document.querySelector('#datatable');
        new simpleDatatables.DataTable(datatable);

        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Hapus data?',
                    text: 'Data yang dihapus tidak dapat dikembalikan',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        @if (session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        @endif
    </script>
@endpush

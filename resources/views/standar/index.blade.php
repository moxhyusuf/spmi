@extends('layouts.app')

@section('title', 'Standar Mutu')

@push('css')
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Standar Mutu</h3>
                    <p class="text-subtitle text-muted">Daftar standar mutu</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        @if (auth()->user()->role === 'ppm')
                            <a href="{{ route('standar.create') }}" class="btn btn-primary">
                                Tambah Standar
                            </a>
                        @endif
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Standar</th>
                                <th>Nama Standar</th>
                                <th>Tanggal Perumusan</th>
                                <th>Tanggal Pengesahan</th>
                                @if (auth()->user()->role === 'ppm')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($standar as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-uppercase">{{ $item->nomor }}</td>
                                    <td class="text-capitalize">{{ $item->nama }}</td>
                                    <td>{{ $item->tanggal_perumusan->format('d-m-Y') }}</td>
                                    <td>{{ $item->tanggal_pengesahan->format('d-m-Y') }}</td>
                                    @if (auth()->user()->role === 'ppm')
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('standar.edit', $item->id) }}" class="btn btn-outline-warning btn-sm">
                                                    Edit
                                                </a>

                                                <form action="{{ route('standar.destroy', $item->id) }}" method="POST" class="form-delete">
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

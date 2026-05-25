<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
    </div>

    <div class="card-content">
        <div class="card-body">
            <form action="{{ $action }}" method="POST" class="form form-vertical">
                @csrf

                @isset($method)
                    @method($method)
                @endisset

                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nomor Standar</label>
                                <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('nomor', $standar->nomor ?? '') }}" placeholder="Masukkan nomor standar">

                                @error('nomor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Standar</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $standar->nama ?? '') }}" placeholder="Masukkan nama standar">

                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Tanggal Perumusan</label>
                                <input type="date" name="tanggal_perumusan" class="form-control @error('tanggal_perumusan') is-invalid @enderror" value="{{ old('tanggal_perumusan', $standar->tanggal_perumusan ?? '') }}">

                                @error('tanggal_perumusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Tanggal Pengesahan</label>
                                <input type="date" name="tanggal_pengesahan" class="form-control @error('tanggal_pengesahan') is-invalid @enderror" value="{{ old('tanggal_pengesahan', $standar->tanggal_pengesahan ?? '') }}">

                                @error('tanggal_pengesahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('standar.index') }}" class="btn btn-light-secondary me-1 mb-1">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

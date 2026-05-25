<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
    </div>

    <div class="card-content">
        <div class="card-body">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                @csrf

                @isset($method)
                    @method($method)
                @endisset

                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label>Indikator</label>

                            <select name="indikator_id" class="form-select @error('indikator_id') is-invalid @enderror">
                                <option value="">Pilih Indikator</option>

                                @foreach ($indikators as $indikator)
                                    <option value="{{ $indikator->id }}" @selected(old('indikator_id', $pelaksanaan->indikator_id ?? '') == $indikator->id)>
                                        {{ $indikator->standar->nama }} - {{ $indikator->no_iku }}
                                    </option>
                                @endforeach
                            </select>

                            @error('indikator_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Program Studi</label>

                            <select name="prodi" class="form-select @error('prodi') is-invalid @enderror">
                                <option value="">Pilih Program Studi</option>

                                <option value="Sistem Informasi" @selected(old('prodi', $pelaksanaan->prodi ?? '') == 'Sistem Informasi')>
                                    Sistem Informasi
                                </option>

                                <option value="Teknologi Informasi" @selected(old('prodi', $pelaksanaan->prodi ?? '') == 'Teknologi Informasi')>
                                    Teknologi Informasi
                                </option>

                                <option value="Sistem Informasi Akuntansi" @selected(old('prodi', $pelaksanaan->prodi ?? '') == 'Sistem Informasi Akuntansi')>
                                    Sistem Informasi Akuntansi
                                </option>
                            </select>

                            @error('prodi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal</label>

                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $pelaksanaan->tanggal ?? '') }}">

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Keterangan</label>

                            <textarea name="keterangan" rows="5" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan keterangan">{{ old('keterangan', $pelaksanaan->keterangan ?? '') }}</textarea>

                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Dokumen</label>

                            <input type="file" name="dokumen" class="form-control @error('dokumen') is-invalid @enderror">

                            @error('dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('pelaksanaan.index') }}" class="btn btn-light-secondary me-1 mb-1">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary me-1 mb-1">
                            Simpan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

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
                                <label>Standar</label>

                                <select name="standard_id" class="form-select @error('standard_id') is-invalid @enderror">
                                    <option value="">Pilih Standar</option>

                                    @foreach ($standars as $standar)
                                        <option value="{{ $standar->id }}" @selected(old('standard_id', $indikator->standard_id ?? '') == $standar->id)>
                                            {{ $standar->nomor }} | {{ $standar->nama }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('standard_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Unit</label>

                                <select name="unit" class="form-select @error('unit') is-invalid @enderror">
                                    <option value="">Pilih Unit</option>

                                    @foreach ($units as $unit)
                                        <option value="{{ $unit }}" @selected(old('unit', $indikator->unit ?? '') == $unit)>
                                            {{ $unit }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Pernyataan Standar</label>

                                <textarea name="pernyataan" rows="4" class="form-control @error('pernyataan') is-invalid @enderror" placeholder="Masukkan pernyataan standar">{{ old('pernyataan', $indikator->pernyataan ?? '') }}</textarea>

                                @error('pernyataan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>No IKU</label>

                                <input type="text" name="no_iku" class="form-control @error('no_iku') is-invalid @enderror" value="{{ old('no_iku', $indikator->no_iku ?? '') }}" placeholder="Masukkan nomor IKU">

                                @error('no_iku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Indikator</label>

                                <textarea name="nama" rows="4" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama indikator">{{ old('nama', $indikator->nama ?? '') }}</textarea>

                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Target</label>

                                <textarea name="target" rows="4" class="form-control @error('target') is-invalid @enderror" placeholder="Masukkan target indikator">{{ old('target', $indikator->target ?? '') }}</textarea>

                                @error('target')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('indikator.index') }}" class="btn btn-light-secondary me-1 mb-1">
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

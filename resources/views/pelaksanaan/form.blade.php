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
                                        ({{ $indikator->standar->nomor }})
                                        {{ $indikator->standar->nama }} | ({{ $indikator->no_iku }}) {{ $indikator->nama }}
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
                            <label>Unit</label>

                            <select name="unit" class="form-select @error('unit') is-invalid @enderror">
                                <option value="">Pilih Unit</option>
                                @foreach (\App\Models\Pelaksanaan::UNIT as $unit)
                                    <option value="{{ $unit }}" @selected(old('unit', $pelaksanaan->unit ?? '') == $unit)>
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal</label>

                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', isset($pelaksanaan) ? $pelaksanaan->tanggal?->format('Y-m-d') : '') }}">

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Uraian Pelaksanaan</label>

                            <textarea name="uraian" rows="5" class="form-control @error('uraian') is-invalid @enderror" placeholder="Masukkan uraian">{{ old('uraian', $pelaksanaan->uraian ?? '') }}</textarea>

                            @error('uraian')
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

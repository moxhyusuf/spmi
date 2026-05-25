@extends('layouts.app')

@section('title', 'Akun')

@section('content')
    <div class="page-heading">

        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Akun</h3>
                    <p class="text-subtitle text-muted">
                        Pengaturan akun pengguna
                    </p>
                </div>
            </div>
        </div>

        <section class="section">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Edit Username
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('akun.update-username') }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label>Nama</label>

                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', auth()->user()->nama) }}">

                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Username</label>

                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', auth()->user()->username) }}">

                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Simpan Username
                                </button>

                            </form>

                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Edit Password
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('akun.update-password') }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label>Password Lama</label>

                                    <input type="password" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror">

                                    @error('password_lama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Password Baru</label>

                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Konfirmasi Password</label>

                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Simpan Password
                                </button>

                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

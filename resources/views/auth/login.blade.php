@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div id="auth" class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f3f4f6;">

        <div class="card shadow-sm" style="width: 100%; max-width: 420px; border-radius: 1rem;">
            <div class="card-body p-5">

                {{-- Logo / Brand --}}
                <div class="text-center mb-4">
                    <div class="mb-2">
                        <span class="fw-bold text-primary" style="font-size: 1.8rem; letter-spacing: 2px;">SPMI</span>
                    </div>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">
                        Sistem Penjaminan Mutu Internal
                    </p>
                </div>

                <hr class="mb-4">

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('login.authenticate') }}" method="POST">
                    @csrf

                    {{-- Username --}}
                    <div class="form-group position-relative  mb-3">
                        <input type="text" name="username" class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" autocomplete="username">
                        @error('username')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group position-relative  mb-4">
                        <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary btn-block btn-lg w-100">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Masuk
                    </button>

                </form>

                {{-- Footer --}}
                <p class="text-center text-muted mt-4 mb-0" style="font-size: 0.78rem;">
                    &copy; {{ date('Y') }} SPMI &mdash; AMIK Taruna Probolinggo
                </p>

            </div>
        </div>

    </div>
@endsection

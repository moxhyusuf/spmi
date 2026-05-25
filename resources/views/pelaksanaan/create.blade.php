@extends('layouts.app')

@section('title', 'Tambah Pelaksanaan')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Pelaksanaan</h3>
                    <p class="text-subtitle text-muted">Form tambah pelaksanaan indikator</p>
                </div>
            </div>
        </div>

        <section class="section">
            @include('pelaksanaan.form', [
                'title' => 'Form Tambah Pelaksanaan',
                'action' => route('pelaksanaan.store'),
            ])
        </section>
    </div>
@endsection

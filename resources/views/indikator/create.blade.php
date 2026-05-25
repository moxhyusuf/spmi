@extends('layouts.app')

@section('title', 'Tambah Indikator')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Indikator</h3>
                    <p class="text-subtitle text-muted">Form tambah indikator mutu</p>
                </div>
            </div>
        </div>

        <section class="section">
            @include('indikator.form', [
                'title' => 'Form Tambah Indikator',
                'action' => route('indikator.store'),
            ])
        </section>
    </div>
@endsection

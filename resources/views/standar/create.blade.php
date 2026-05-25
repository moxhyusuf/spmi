@extends('layouts.app')

@section('title', 'Tambah Standar')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Standar</h3>
                    <p class="text-subtitle text-muted">Form tambah standar mutu</p>
                </div>
            </div>
        </div>

        <section class="section">
            @include('standar.form', [
                'title' => 'Form Tambah Standar',
                'action' => route('standar.store'),
            ])
        </section>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Edit Pelaksanaan')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Pelaksanaan</h3>
                    <p class="text-subtitle text-muted">Form edit pelaksanaan indikator</p>
                </div>
            </div>
        </div>

        <section class="section">
            @include('pelaksanaan.form', [
                'title' => 'Form Edit Pelaksanaan',
                'action' => route('pelaksanaan.update', $pelaksanaan->id),
                'method' => 'PUT',
                'pelaksanaan' => $pelaksanaan,
            ])
        </section>
    </div>
@endsection

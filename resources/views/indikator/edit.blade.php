@extends('layouts.app')

@section('title', 'Edit Indikator')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Indikator</h3>
                    <p class="text-subtitle text-muted">Form edit indikator mutu</p>
                </div>
            </div>
        </div>

        <section class="section">
            @include('indikator.form', [
                'title' => 'Form Edit Indikator',
                'action' => route('indikator.update', $indikator->id),
                'method' => 'PUT',
                'indikator' => $indikator,
            ])
        </section>
    </div>
@endsection

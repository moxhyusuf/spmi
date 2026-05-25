@extends('layouts.app')

@section('title', 'Edit Standar')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Standar</h3>
                    <p class="text-subtitle text-muted">Form edit standar mutu</p>
                </div>
            </div>
        </div>

        <section class="section">
            @include('standar.form', [
                'title' => 'Form Edit Standar',
                'action' => route('standar.update', $standar->id),
                'method' => 'PUT',
                'standar' => $standar,
            ])
        </section>
    </div>
@endsection

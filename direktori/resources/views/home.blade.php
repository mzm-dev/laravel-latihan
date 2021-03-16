{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">{{ config('app.name', 'Laravel') }}</div>
            <div class="card-body">


            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

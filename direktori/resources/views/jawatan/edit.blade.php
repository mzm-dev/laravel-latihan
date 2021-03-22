{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Kemaskini Jawatan</div>
        <div class="card-body">

            <form action="{{ route('jawatan.update', $jawatan) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                @include('jawatan._form')

                <button type="submit" class="btn btn-success">Kemaskini</button>

            </form>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

@endsection

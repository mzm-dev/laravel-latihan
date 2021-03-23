{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Daftar User</div>
        <div class="card-body">

            <form action="{{ route('user.store') }}" method="POST" novalidate>
                @csrf

                @include('user._form')

                <button type="submit" class="btn btn-primary">Daftar</button>

            </form>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

@endsection

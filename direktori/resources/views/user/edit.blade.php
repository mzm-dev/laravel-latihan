{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Kemaskini User</div>
        <div class="card-body">

            <form action="{{ route('user.update', $user) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                @include('user._form')

                <button type="submit" class="btn btn-success">Kemaskini</button>

            </form>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

@endsection

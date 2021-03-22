{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Kemaskini Daerah</div>
        <div class="card-body">

            <form action="{{ route('daerah.update', $daerah) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                @include('daerah._form')

                <button type="submit" class="btn btn-success">Kemaskini</button>

            </form>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

@endsection

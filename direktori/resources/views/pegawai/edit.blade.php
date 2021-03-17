{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Kemaskini Pegawai</div>
            <div class="card-body">

                <form action="{{ route('pegawai.update', $pegawai) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    @include('pegawai._form')

                    <button type="submit" class="btn btn-success">Kemaskini</button>

                </form>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

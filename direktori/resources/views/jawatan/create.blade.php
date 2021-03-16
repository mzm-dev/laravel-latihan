{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Daftar Jawatan</div>
            <div class="card-body">

                <form action="{{ route('jawatan.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Jawatan</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Sila masukkan nama jawatan"
                            value="{{ old('nama') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Daftar</button>

                </form>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

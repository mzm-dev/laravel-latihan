{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Daftar Negeri</div>
            <div class="card-body">

                <form action="{{ route('negeri.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Negeri</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Sila masukkan nama negeri"
                            value="{{ old('nama') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Daftar</button>

                </form>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

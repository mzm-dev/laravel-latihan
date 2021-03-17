{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Kemaskini Negeri</div>
            <div class="card-body">

                <form action="{{ route('negeri.update', $negeri) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama Negeri</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ old('nama', $negeri->nama ?? null ) }}">
                    </div>

                    <button type="submit" class="btn btn-success">Kemaskini</button>

                </form>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

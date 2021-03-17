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

                    <div class="form-group">
                        <label for="nama">Nama Daerah</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ old('nama', $daerah->nama ?? null ) }}">
                    </div>

                    <button type="submit" class="btn btn-success">Kemaskini</button>

                </form>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

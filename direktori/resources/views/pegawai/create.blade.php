{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Daftar Pegawai</div>
            <div class="card-body">

                <form action="{{ route('pegawai.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="nama">{{ __('Nama Pegawai') }}</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pegawai->nama ?? null) }}">

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="emel">{{ __('E-mel Rasmi') }}</label>
                            <input type="email" class="form-control @error('emel') is-invalid @enderror" id="emel" name="emel" value="{{ old('emel', $pegawai->emel ?? null) }}">

                            @error('emel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nokp">{{ __('No Kad Pengenalan') }}</label>
                            <input type="text" class="form-control @error('gred') is-invalid @enderror" id="nokp" name="nokp" minlength="12" maxlength="12" value="{{ old('nokp', $pegawai->nokp ?? null) }}">

                            @error('nokp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jabatan_id">{{ __('Jabatan') }}</label>
                        <input type="text" class="form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id" value="{{ old('jabatan_id', $pegawai->jabatan_id ?? null) }}">

                        @error('jabatan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="jawatan_id">{{ __('Jawatan') }}</label>
                            <input type="text" class="form-control @error('jawatan_id') is-invalid @enderror" id="jawatan_id" name="jawatan_id" value="{{ old('jawatan_id', $pegawai->jawatan_id ?? null) }}">

                            @error('jawatan_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gred">{{ __('Gred') }}</label>
                            <input type="text" class="form-control @error('gred') is-invalid @enderror" id="gred" name="gred" value="{{ old('gred', $pegawai->gred ?? null) }}">

                            @error('gred')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_tel_pejabat">{{ __('No Tel Pejabat') }}</label>
                            <input type="text" class="form-control @error('no_tel_pejabat') is-invalid @enderror" id="no_tel_pejabat" name="no_tel_pejabat" value="{{ old('jawatan_id', $pegawai->no_tel_pejabat ?? null) }}">

                            @error('no_tel_pejabat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_tel_bimbit">{{ __('No Tel Bimbit') }}</label>
                            <input type="text" class="form-control @error('no_tel_bimbit') is-invalid @enderror" id="no_tel_bimbit" name="no_tel_bimbit" value="{{ old('no_tel_bimbit', $pegawai->no_tel_bimbit ?? null) }}">

                            @error('no_tel_bimbit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Daftar</button>

                </form>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>

@endsection

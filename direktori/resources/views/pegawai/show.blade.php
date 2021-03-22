{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Butiran Pegawai</div>
        <div class="card-body">

            @php
            $blank = 'Tiada Maklumat';
            @endphp
            @if ($pegawai->imej && Storage::disk('public')->exists('images/'.$pegawai->imej))
            <img src="{{ asset('storage/images/'.$pegawai->imej) }}" alt="gambar" class="img-thumbnail float-right" width="92">
            @else
            <img src="{{ asset('images/no-image-found.jpg') }}" alt="gambar" class="img-thumbnail" width="">
            @endif
            <dl class="row">

                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $pegawai->nama }}</dd>

                <dt class="col-sm-3">E-mel</dt>
                <dd class="col-sm-9">{{ $pegawai->emel }}</dd>

                <dt class="col-sm-3">No K/P</dt>
                <dd class="col-sm-9">{{ $pegawai->nokp ?? $blank }}</dd>

                <dt class="col-sm-3">No Telefon Pejabat</dt>
                <dd class="col-sm-9">{{ $pegawai->no_telefon_pejabat ?? $blank }}</dd>

                <dt class="col-sm-3">No Telefon Bimbit</dt>
                <dd class="col-sm-9">{{ $pegawai->no_telefon_bimbit  ?? $blank }}</dd>

                <dt class="col-sm-3">Negeri</dt>
                <dd class="col-sm-9">{{ $pegawai->negeri ? $pegawai->negeri->nama : $blank }} </dd>
                {{-- negeri merujuk nama function di dalam model Pegawai --}}

                <dt class="col-sm-3">Daerah</dt>
                <dd class="col-sm-9">{{ $pegawai->rujukDaerah ? $pegawai->rujukDaerah->nama : $blank }}</dd>
                {{-- rujukDaerah merujuk nama function di dalam model Pegawai --}}

                <dt class="col-sm-3">Jabatan</dt>
                <dd class="col-sm-9">{{ $pegawai->jabatan ? $pegawai->jabatan->nama : $blank }}</dd>
                {{-- jabatan merujuk nama function di dalam model Pegawai --}}

                <dt class="col-sm-3">Jawatan</dt>
                <dd class="col-sm-9">
                    {{-- if jawatan is exists --}}
                    @if ($pegawai->jawatan)
                    {{ $pegawai->jawatan->nama }}
                    @else
                    {{ $blank }}
                    @endif
                </dd>
                {{-- jawatan merujuk nama function di dalam model Pegawai --}}

                <dt class="col-sm-3">Gred</dt>
                <dd class="col-sm-9">{{ $pegawai->gred ?? 'Tiada Maklumat' }}</dd>
            </dl>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

@endsection

{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Direktori Pegawai
            <div class="float-right">
                @include('_filter')
            </div>
        </div>
        <div class="card-body">
            @php $blank = 'Tiada Maklumat'; @endphp
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>Jawatan</th>
                        <th>No.Tel Pejabat</th>
                        <th>No.Tel Bimbit</th>
                        <th>Bahagain</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- Looping Data --}}
                    @forelse ($pegawaiArray as $pegawai)
                    <tr>
                        <td>
                            @if ($pegawai->imej && Storage::disk('public')->exists('images/'.$pegawai->imej))
                            <img src="{{ asset('storage/images/'.$pegawai->imej) }}" alt="gambar" class="img-thumbnail float-left mr-2" width="64">
                            @else
                            <img src="{{ asset('images/no-image-found.jpg') }}" alt="gambar" class="img-thumbnail float-left mr-2" width="64">
                            @endif

                            {!! "<b>".$pegawai->nama."</b>" !!}
                            {!! $pegawai->emel ? "<br />$pegawai->emel" : $blank !!}
                        </td>
                        <td>{{ $pegawai->jawatan ? $pegawai->jawatan->nama : $blank }}</td>
                        <td>{{ $pegawai->no_telefon_pejabat ?? $blank  }}</td>
                        <td>{{ $pegawai->no_telefon_bimbit ?? $blank  }}</td>
                        <td>{{ $pegawai->jabatan ? $pegawai->jabatan->nama : $blank }}</td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat pegawai</div>' !!}
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(count($pegawaiArray) > 0)
            {{-- Pagination button link --}}
            {{ $pegawaiArray->links() }}
            @endif
        </div>
    </div>
</div>


@endsection

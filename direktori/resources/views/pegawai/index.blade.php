{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Senarai Pegawai
            <a class="btn btn-primary float-right" href="{{ route('pegawai.create') }}">Daftar</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Tarikh Cipta</th>
                        <th>Tarikh Kemaskini</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- Looping Data --}}
                    @forelse ($pegawaiArray as $pegawai)
                    <tr>
                        <td>{{ $pegawai->id }}</td>
                        <td>{{$pegawai->nama }}</td>
                        <td>{{ $pegawai->created_at->format('d-m-Y h:i a') }}</td>
                        <td>{{ $pegawai->updated_at->format('d-m-Y g:i A') }}</td>
                        <td>
                            <form action="{{ route('pegawai.destroy',$pegawai) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai) }}">Butiran</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('pegawai.edit',$pegawai) }}">Kemaskini</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
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

{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Senarai Pegawai</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('pegawai.create') }}">Daftar</a>
                <table class="table">
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
                                <td>{{ $pegawai->nama }} </td>
                                <td>{{ $pegawai->created_at }}</td>
                                <td>{{ $pegawai->updated_at }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit',$pegawai) }}">Kemaskini</a>

                                    <form action="{{ route('pegawai.destroy',$pegawai) }}" method="POST"
                                     onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-link">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Tiada maklumat pegawai' }}
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

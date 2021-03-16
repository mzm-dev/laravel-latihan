{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Senarai Jabatan</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('jabatan.create') }}">Daftar</a>
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
                        @forelse ($jabatanArray as $jabatan)
                            <tr>
                                <td>{{ $jabatan->id }}</td>
                                <td>{{ $jabatan->nama }} </td>
                                <td>{{ $jabatan->created_at }}</td>
                                <td>{{ $jabatan->updated_at }}</td>
                                <td>
                                    <a href="{{ route('jabatan.edit',$jabatan) }}">Kemaskini</a>

                                    <form action="{{ route('jabatan.destroy',$jabatan) }}" method="POST"
                                     onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-link">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Tiada maklumat jabatan' }}
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if(count($jabatanArray) > 0)
                {{-- Pagination button link --}}
                    {{ $jabatanArray->links() }}
                @endif
            </div>
        </div>
    </div>


@endsection

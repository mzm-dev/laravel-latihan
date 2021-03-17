{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Senarai Negeri</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('negeri.create') }}">Daftar</a>
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
                        @forelse ($negeriArray as $negeri)
                            <tr>
                                <td>{{ $negeri->id }}</td>
                                <td>{{ $negeri->nama }} </td>
                                <td>{{ $negeri->created_at }}</td>
                                <td>{{ $negeri->updated_at }}</td>
                                <td>
                                    <a href="{{ route('negeri.edit',$negeri) }}">Kemaskini</a>

                                    <form action="{{ route('negeri.destroy',$negeri) }}" method="POST"
                                     onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-link">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Tiada maklumat negeri' }}
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if(count($negeriArray) > 0)
                {{-- Pagination button link --}}
                    {{ $negeriArray->links() }}
                @endif
            </div>
        </div>
    </div>


@endsection

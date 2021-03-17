{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Senarai Daerah</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('daerah.create') }}">Daftar</a>
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
                        @forelse ($daerahArray as $daerah)
                            <tr>
                                <td>{{ $daerah->id }}</td>
                                <td>{{ $daerah->nama }} </td>
                                <td>{{ $daerah->created_at }}</td>
                                <td>{{ $daerah->updated_at }}</td>
                                <td>
                                    <a href="{{ route('daerah.edit',$daerah) }}">Kemaskini</a>

                                    <form action="{{ route('daerah.destroy',$daerah) }}" method="POST"
                                     onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-link">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Tiada maklumat daerah' }}
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if(count($daerahArray) > 0)
                {{-- Pagination button link --}}
                    {{ $daerahArray->links() }}
                @endif
            </div>
        </div>
    </div>


@endsection

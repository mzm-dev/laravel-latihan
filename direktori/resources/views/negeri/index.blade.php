{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Senarai Negeri
            <a class="btn btn-primary float-right" href="{{ route('negeri.create') }}">Daftar</a>
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
                    @forelse ($negeriArray as $negeri)
                    <tr>
                        <td>{{ $negeri->id }}</td>
                        <td>{{ $negeri->nama }} </td>
                        <td>{{ $negeri->created_at }}</td>
                        <td>{{ $negeri->updated_at }}</td>
                        <td>
                            <form action="{{ route('negeri.destroy',$negeri) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('negeri.edit',$negeri) }}">Kemaskini</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat negeri</div>' !!}
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

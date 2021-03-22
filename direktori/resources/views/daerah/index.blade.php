{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Senarai Daerah
            <a class="btn btn-primary float-right" href="{{ route('daerah.create') }}">Daftar</a>
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
                    @forelse ($daerahArray as $daerah)
                    <tr>
                        <td>{{ $daerah->id }}</td>
                        <td>{{ $daerah->nama }} </td>
                        <td>{{ $daerah->created_at }}</td>
                        <td>{{ $daerah->updated_at }}</td>
                        <td>
                            <form action="{{ route('daerah.destroy',$daerah) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('daerah.edit',$daerah) }}">Kemaskini</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat daerah</div>' !!}
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

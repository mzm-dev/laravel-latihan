{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Senarai Jawatan
            <a class="btn btn-primary float-right" href="{{ route('jawatan.create') }}">Daftar</a>
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
                    @forelse ($jawatanArray as $jawatan)
                    <tr>
                        <td>{{ $jawatan->id }}</td>
                        <td>{{ $jawatan->nama }} </td>
                        <td>{{ $jawatan->created_at }}</td>
                        <td>{{ $jawatan->updated_at }}</td>
                        <td>
                            <form action="{{ route('jawatan.destroy',$jawatan) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('jawatan.edit',$jawatan) }}">Kemaskini</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat jawatan</div>' !!}
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(count($jawatanArray) > 0)
            {{-- Pagination button link --}}
            {{ $jawatanArray->links() }}
            @endif
        </div>
    </div>
</div>


@endsection

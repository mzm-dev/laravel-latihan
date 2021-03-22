{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Senarai Jabatan
            <a class="btn btn-primary float-right" href="{{ route('jabatan.create') }}">Daftar</a>
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
                    @forelse ($jabatanArray as $jabatan)
                    <tr>
                        <td>{{ $jabatan->id }}</td>
                        <td>{{ $jabatan->nama }} </td>
                        <td>{{ $jabatan->created_at }}</td>
                        <td>{{ $jabatan->updated_at }}</td>
                        <td>
                            <form action="{{ route('jabatan.destroy',$jabatan) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-warning btn-sm" href="{{ route('jabatan.edit',$jabatan) }}">Kemaskini</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat jabatan</div>' !!}
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

{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Senarai User
            <a class="btn btn-primary float-right" href="{{ route('user.create') }}">Daftar</a>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Tarikh Cipta</th>
                        <th>Tarikh Kemaskini</th>
                        <th>Status Akaun</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- Looping Data --}}
                    @forelse ($userArray as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            @if ($user->email_verified_at)
                            {{ 'Sah' }}
                            @else
                            <form action="{{ route('user.pengesahan',$user) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk sahkan akaun?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info btn-sm">Meunggu</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('user.destroy',$user) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('user.edit',$user) }}">Kemaskini</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat user</div>' !!}
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(count($userArray) > 0)
            {{-- Pagination button link --}}
            {{ $userArray->links() }}
            @endif
        </div>
    </div>
</div>


@endsection

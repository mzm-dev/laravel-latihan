{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Senarai Jawatan</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('jawatan.create') }}">Daftar</a>
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
                        @forelse ($jawatanArray as $jawatan)
                            <tr>
                                <td>{{ $jawatan->id }}</td>
                                <td>{{ $jawatan->nama }} </td>
                                <td>{{ $jawatan->created_at }}</td>
                                <td>{{ $jawatan->updated_at }}</td>
                                <td>
                                    <a href="{{ route('jawatan.edit',$jawatan) }}">Kemaskini</a>
                                </td>
                            </tr>
                        @empty
                            {{ 'Tiada maklumat jawatan' }}
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

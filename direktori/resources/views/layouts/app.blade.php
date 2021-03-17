<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Laman Utama</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('jawatan.index') }}">Jawatan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('jabatan.index') }}">Jabatan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('negeri.index') }}">Negeri</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('daerah.index') }}">Daerah</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
                </li>

            </ul>
            </div>
        </div>
      </nav>

    {{-- Alert Notification --}}
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{!! $message !!}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    {{-- Container --}}
    @yield('content')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('forms.daftar') }}">
        <label for="nama">Nama</label><br/>
        <input type="text" name="nama" id="nama"><br/>
        <label for="umur">Umur</label><br/>
        <input type="text" name="umur" id="umur">
    </form>
</body>
</html>

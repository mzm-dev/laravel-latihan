<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>String Compact</h1>
<p>Nama : {{ $name }}</p>
<p>Umur : {{ $umur }} </p>
<p>Kategori :
    @if ($umur > 0 && $umur <=12 )
        {{ 'Kanak-kanak' }}
    @elseif($umur > 12 && $umur <= 21)
        {{ 'Remaja' }}
    @elseif($umur > 21)
        {{ 'Dewasa' }}
    @else
        {{ 'Bayi' }}
    @endif

</p>

</body>
</html>

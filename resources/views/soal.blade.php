<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <center><h1>{{$resto}}</h1></center>
    @foreach ( $data as $makanan )
        Nama : {{ $makanan['nama_benda'] }} <br>
        Harga : {{ $makanan['harga'] }}<br>
        Jumlah : {{ $makanan['jumlah'] }}<br>
        @php $total = $makanan['jumlah'] * $makanan['harga']; @endphp
        Total : {{ $total }}
        <hr>
    @endforeach
</body>
</html>
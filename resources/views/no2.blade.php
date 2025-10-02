<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Status Nilai</title>
</head>
<body>
    <h2>Informasi Nilai</h2>
    <p>Nama: {{ $nama }}</p>
    <p>Mata Pelajaran: {{ $mapel }}</p>
    <p>Nilai: {{ $nilai }}</p>
    <p>Status: 
        @if ($nilai >= 75)
            Lulus
        @else
            Tidak Lulus
        @endif
    </p>
</body>
</html>

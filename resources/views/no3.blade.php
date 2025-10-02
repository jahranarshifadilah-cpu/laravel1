<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grading Nilai</title>
</head>
<body>
    <h2>Grading</h2>
    <p>Nama: {{ $nama }}</p>
    <p>Nilai: {{ $nilai }}</p>
    <p>Grade: 
        @if ($nilai >= 90)
            A
        @elseif ($nilai >= 80)
            B
        @elseif ($nilai >= 70)
            C
        @elseif ($nilai >= 60)
            D
        @else
            E
        @endif
    </p>
</body>
</html>

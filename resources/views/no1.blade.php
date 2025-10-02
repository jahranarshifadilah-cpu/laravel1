<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>
    <h2>Daftar Barang</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
        @php $total = 0; @endphp
        @foreach ($barang as $item)
            @php $subtotal = $item['harga'] * $item['qty']; @endphp
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
            </tr>
            @php $total += $subtotal; @endphp
        @endforeach
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
        </tr>
    </table>
</body>
</html>

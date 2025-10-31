@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>
    <p><strong>Kode:</strong> {{ $transaksi->kode_transaksi }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
    <p><strong>Pelanggan:</strong> {{ $transaksi->pelanggan->nama }}</p>

    <h4>Produk Dibeli:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->produk1s as $p)
            <tr>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->pivot->jumlah }}</td>
                <td>Rp {{ number_format($p->pivot->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Harga: Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h4>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

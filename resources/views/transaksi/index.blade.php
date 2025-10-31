@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $t)
            <tr>
                <td>{{ $t->kode_transaksi }}</td>
                <td>{{ $t->tanggal }}</td>
                <td>{{ $t->pelanggan->nama }}</td>
                <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Transaksi</label>
            <input type="text" name="kode_transaksi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($pelanggans as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <hr>
        <h5>Produk</h5>
        <div id="produk-container">
            <div class="row mb-2">
                <div class="col-md-5">
                    <select name="produk1_id[]" class="form-control">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produk1s as $prod)
                        <option value="{{ $prod->id }}">{{ $prod->nama_produk }} - Rp{{ $prod->harga }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection

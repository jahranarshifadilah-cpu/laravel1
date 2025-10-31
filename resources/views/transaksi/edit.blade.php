@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode Transaksi</label>
            <input type="text" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $transaksi->tanggal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($pelanggans as $p)
                <option value="{{ $p->id }}" {{ $transaksi->pelanggan_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <hr>
        <h5>Produk</h5>

        <div id="produk-container">
            @foreach ($transaksi->produk1s as $index => $p)
            <div class="row mb-2 produk-row">
                <div class="col-md-5">
                    <select name="produk1_id[]" class="form-control" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produk1s as $prod)
                        <option value="{{ $prod->id }}" {{ $p->id == $prod->id ? 'selected' : '' }}>
                            {{ $prod->nama_produk }} - Rp{{ number_format($prod->harga, 0, ',', '.') }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" value="{{ $p->pivot->jumlah }}" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-produk">Hapus</button>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" id="add-produk" class="btn btn-secondary mt-2">+ Tambah Produk</button>
        <br><br>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
document.getElementById('add-produk').addEventListener('click', function() {
    const container = document.getElementById('produk-container');
    const row = document.createElement('div');
    row.classList.add('row', 'mb-2', 'produk-row');
    row.innerHTML = `
        <div class="col-md-5">
            <select name="produk1_id[]" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produk1s as $prod)
                <option value="{{ $prod->id }}">{{ $prod->nama_produk }} - Rp{{ number_format($prod->harga, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-produk">Hapus</button>
        </div>
    `;
    container.appendChild(row);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-produk')) {
        e.target.closest('.produk-row').remove();
    }
});
</script>
@endsection

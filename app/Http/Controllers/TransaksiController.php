<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk1;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pelanggan')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $produk1s   = Produk1::all();
        return view('transaksi.create', compact('pelanggans', 'produk1s'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis',
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'produk1_id'     => 'required|array',
            'jumlah'         => 'required|array',
        ]);

        $transaksi = Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal'        => $request->tanggal,
            'pelanggan_id'   => $request->pelanggan_id,
            'total_harga'    => 0,
        ]);

        $total = 0;

        foreach ($request->produk1_id as $key => $produk1_id) {
            $produk   = Produk1::findOrFail($produk1_id);
            $jumlah   = $request->jumlah[$key];
            $subtotal = $produk->harga * $jumlah;

            $transaksi->produk1s()->attach($produk1_id, [
                'jumlah'   => $jumlah,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $transaksi->update(['total_harga' => $total]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load('pelanggan', 'produk1s');
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        $produk1s   = Produk1::all();
        $transaksi->load('produk1s');
        return view('transaksi.edit', compact('transaksi', 'pelanggans', 'produk1s'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'tanggal'      => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggans,id',
        ]);

        $transaksi->update([
            'tanggal'      => $request->tanggal,
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        $transaksi->produk1s()->detach();
        $total = 0;

        foreach ($request->produk1_id as $key => $produk1_id) {
            $produk   = Produk1::findOrFail($produk1_id);
            $jumlah   = $request->jumlah[$key];
            $subtotal = $produk->harga * $jumlah;

            $transaksi->produk1s()->attach($produk1_id, [
                'jumlah'   => $jumlah,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $transaksi->update(['total_harga' => $total]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}

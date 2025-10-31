<?php
namespace App\Http\Controllers;

use App\Models\Produk1;
use Illuminate\Http\Request;

class Produk1Controller extends Controller
{
    public function index()
    {
        // Ambil semua produk, dikirim ke view sebagai $produk1s
        $produk1s = Produk1::latest()->get();
        return view('produk1.index', compact('produk1s'));
    }

    public function create()
    {
        return view('produk1.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|string|max:20',
            'stok'        => 'required|string',
        ]);

        Produk1::create($request->all());

        return redirect()->route('produk1.index')->with('success', 'Data produk berhasil ditambahkan!');
    }

    public function show(Produk1 $produk1)
    {
        // Ubah parameter menjadi $produk1 agar konsisten dengan view
        return view('produk1.show', compact('produk1'));
    }

    public function edit(Produk1 $produk1)
    {
        return view('produk1.edit', compact('produk1'));
    }

    public function update(Request $request, Produk1 $produk1)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|string|max:20',
            'stok'        => 'required|string',
        ]);

        $produk1->update($request->all());

        return redirect()->route('produk1.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy(Produk1 $produk1)
    {
        $produk1->delete();
        return redirect()->route('produk1.index')->with('success', 'Data produk berhasil dihapus!');
    }
}

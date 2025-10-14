<?php
namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        return view('biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'         => 'required|string|max:255',
            'tgl_lahir'    => 'required|date',
            'jk'           => 'required|in:Laki-laki,Perempuan',
            'agama'        => 'required|string|max:50',
            'alamat'       => 'required|string',
            'foto'         => 'nullable|image|max:2048',
            'tinggi_badan' => 'required|numeric',
            'berat_badan'  => 'required|numeric',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(Biodata $biodatum)
    {
        return view('biodata.edit', compact('biodatum'));
    }

    public function update(Request $request, Biodata $biodatum)
    {
        $data = $request->validate([
            'nama'         => 'required|string|max:255',
            'tgl_lahir'    => 'required|date',
            'jk'           => 'required|in:Laki-laki,Perempuan',
            'agama'        => 'required|string|max:50',
            'alamat'       => 'required|string',
            'foto'         => 'nullable|image|max:2048',
            'tinggi_badan' => 'required|numeric',
            'berat_badan'  => 'required|numeric',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada (optional)
            if ($biodatum->foto) {
                \Storage::disk('public')->delete($biodatum->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $biodatum->update($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Biodata $biodatum)
    {
        // Hapus foto dari storage jika ada
        if ($biodatum->foto) {
            \Storage::disk('public')->delete($biodatum->foto);
        }

        $biodatum->delete();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil dihapus!');
    }
}
?>
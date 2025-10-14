<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class RelasiController extends Controller
{
    public function oneToOne()
    {
        // Mahasiswa dengan relasi wali (one-to-one)
        $mahasiswas = Mahasiswa::with('wali')->get();
        return view('relasi.one_to_one', compact('mahasiswas'));
    }

    public function oneToMany()
    {
        // Dosen beserta mahasiswa bimbingannya (one-to-many)
        $dosens = Dosen::with('mahasiswas')->get();
        return view('relasi.one_to_many', compact('dosens'));
    }

    public function manyToMany()
    {
        // Mahasiswa dengan hobinya (many-to-many)
        $mahasiswas = Mahasiswa::with('hobis')->get();
        return view('relasi.many_to_many', compact('mahasiswas'));
    }

    public function eloquent()
    {
        // Ambil semua data mahasiswa lengkap dengan relasinya
        $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobis')->get();

        // Kirim data ke view
        return view('relasi.eloquent', compact('mahasiswa'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    // Halaman daftar lowongan (untuk user)
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('hire', compact('lowongans'));
    }

    // Halaman list lowongan (untuk admin)
public function list()
{
    $lowongans = Lowongan::all();
    $totalLowongan = Lowongan::count(); // hitung langsung dari DB

    return view('listLowongan', compact('lowongans', 'totalLowongan'));
}


    // Form tambah lowongan (untuk admin)
    public function create()
    {
        return view('tambahLow'); // bikin file resources/views/tambahLow.blade.php
    }

    // Form edit lowongan
    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('editLowongan', compact('lowongan'));
    }

    // Update lowongan
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|max:255',
            'mulai'     => 'required|date',
            'selesai'   => 'required|date|after_or_equal:mulai',
            'deskripsi' => 'required',
        ]);

        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update($request->all());

        return redirect()->route('lowongan.list')->with('success', 'Lowongan berhasil diperbarui!');
    }

    // Simpan lowongan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|max:255',
            'mulai'     => 'required|date',
            'selesai'   => 'required|date|after_or_equal:mulai',
            'deskripsi' => 'required',
        ]);

        Lowongan::create([
            'judul'     => $request->judul,
            'mulai'     => $request->mulai,
            'selesai'   => $request->selesai,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('lowongan.list')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    // Hapus lowongan
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('lowongan.list')->with('success', 'Lowongan berhasil dihapus!');
    }
}

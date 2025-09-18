<?php

namespace App\Http\Controllers;

use App\Models\Polisi;
use Illuminate\Http\Request;

class PolisiController extends Controller
{
    // Method untuk menampilkan form pendaftaran Polisi
    public function showForm()
    {
        return view('pendaftaran-polisi');  // pastikan form pendaftaran ada di view pendaftaran-polisi.blade.php
    }

    // Method untuk menyimpan data pendaftaran Polisi
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'roblox' => 'required|string|max:255',
            'discord' => 'required|string|max:255',
            'reason' => 'required|string|max:1000',
        ]);

        // Membuat entri baru di tabel Polisi
        Polisi::create([
            'roblox' => $validated['roblox'],
            'discord' => $validated['discord'],
            'reason' => $validated['reason'],
            'status' => 'pending',  // Status awal adalah pending
        ]);

        // Redirect ke halaman daftar Polisi setelah pendaftaran berhasil
       return redirect('/hire')->with('success', 'Pendaftaran Polisi berhasil!')->with('swal', true);
    }

    // Method untuk menampilkan daftar Polisi
    public function index()
    {
        $polis = Polisi::all();
        return view('polisi', compact('polis'));
    }

    // Method untuk melihat detail Polisi
    public function show($id)
    {
        $polisi = Polisi::findOrFail($id);
        return view('polisi-show', compact('polisi'));
    }

    // Method untuk verifikasi status Polisi
 public function verifyPage($id)
    {
        $polisi = Polisi::findOrFail($id);
        return view('verifikasi-polisi', compact('polisi'));
    }

    // Method untuk memperbarui status Polisi
    public function updateStatus(Request $request, $id)
    {
        // Validasi status yang dipilih
        $validated = $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        // Cari data Polisi
        $polisi = Polisi::findOrFail($id);

        // Update status berdasarkan pilihan
        $polisi->status = $validated['status'];
        $polisi->save();

        return redirect()->route('polisi.index')->with('success', 'Status pendaftaran Polisi berhasil diperbarui!');
    }


    // Method untuk menghapus data Polisi
    public function destroy($id)
    {
        $polisi = Polisi::findOrFail($id);
        $polisi->delete();

        return redirect()->route('polisi.index')->with('success', 'Data Polisi berhasil dihapus.');
    }
}

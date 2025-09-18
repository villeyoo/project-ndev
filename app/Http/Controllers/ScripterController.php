<?php

namespace App\Http\Controllers;

use App\Models\Scripter;
use Illuminate\Http\Request;

class ScripterController extends Controller
{
 public function index()
    {
        $scripters = Scripter::all(); // Mengambil semua data Scripter dari database
        return view('scripter', compact('scripters')); // Mengirim data ke view
    }

    // Method untuk melihat detail Scripter
    public function show($id)
    {
        $scripter = Scripter::findOrFail($id);
        return view('scripter.show', compact('scripter'));
    }

    // Method untuk verifikasi status Scripter
     public function verifyPage($id)
    {
        $scripter = Scripter::findOrFail($id);
        return view('verifikasi-scripter', compact('scripter'));
    }

       public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $scripter = Scripter::findOrFail($id);
        $scripter->status = $validated['status'];
        $scripter->save();

        return redirect()->route('scripter.index')->with('success', 'Status pengajuan Scripter berhasil diperbarui!');
    }

    // Method untuk menghapus data Scripter
    public function destroy($id)
    {
        $scripter = Scripter::findOrFail($id);
        $scripter->delete();

        return redirect()->route('scripter.index')->with('success', 'Data Scripter berhasil dihapus.');
    }

    
    
    // Method untuk menyimpan data pendaftaran Scripter
    public function store(Request $request)
    {

        
        // Validasi input
        $validated = $request->validate([
            'roblox' => 'required|string|max:255',
            'discord' => 'required|string|max:255',
            'reason' => 'required|string|max:1000',
            'experience' => 'required|string|max:2000',
            'portfolio' => 'nullable|url',  // Validasi untuk link portofolio (opsional)
        ]);

        // Membuat entri baru di tabel Scripter
        Scripter::create([
            'roblox' => $validated['roblox'],
            'discord' => $validated['discord'],
            'reason' => $validated['reason'],
            'experience' => $validated['experience'],
            'portfolio' => $validated['portfolio'] ?? null,  // Menyimpan link portofolio jika ada
            'status' => 'pending',  // Status awal adalah pending
        ]);

        // Redirect kembali dengan pesan sukses
       return redirect('/hire')->with('success', 'Pendaftaran Scripter berhasil!')->with('swal', true);
    }
}

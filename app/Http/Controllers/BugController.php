<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;

class BugController extends Controller
{
    /**
     * Simpan bug baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'prioritas' => 'required|in:Low,Medium,High,Critical',
            'deskripsi' => 'required|string',
            'tanggal'   => 'required|date',
        ]);

        // Simpan ke database
        Bug::create($validated);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('dashboard')
            ->with('success', 'Laporan bug berhasil ditambahkan!');
    }

    /**
     * Opsional: Tampilkan daftar bug.
     */
    public function index()
    {
        $bugs = Bug::latest()->get();
        return view('tambahBug', compact('bugs'));
    }
}

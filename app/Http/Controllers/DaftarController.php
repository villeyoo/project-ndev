<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    // Tampilkan form
    public function index()
    {
        return view('daftar'); // resources/views/daftar.blade.php
    }

    // Proses submit form
    public function submit(Request $request)
    {
        $request->validate([
            'posisi' => 'required',
            'roblox' => 'required',
            'discord' => 'required',
            'alasan' => 'required',
        ]);

        // Simpan data ke database (opsional)
        // Contoh:
        // \App\Models\Daftar::create($request->all());

        return redirect()->route('daftar.form')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}

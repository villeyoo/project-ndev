<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan; // Pastikan model Lowongan di-import
use App\Models\ContentCreator;  // Import model ContentCreator
use App\Models\Scripter;  // Import model Scripter
use App\Models\Polisi;  // Import model Polisi

class AdminController extends Controller
{
    public function index()
    {
        // Hitung total lowongan
        $totalLowongan = Lowongan::count();
          $totalContentCreator = ContentCreator::count();
           $totalPolisi = Polisi::count();
            $totalScripter = Scripter::count();
           

        // Kirim ke view
        return view('dashboard', compact('totalLowongan','totalContentCreator','totalPolisi','totalScripter'));
    }

    public function showScripter()
    {
        // Mengambil data pelamar dengan posisi Scripter
        $scripters = Scripter::all();
        return view('scripter', compact('scripters'));
    }

    public function showPolisi()
    {
        // Mengambil data pelamar dengan posisi Polisi
        $polisis = Polisi::all();
        return view('polisi', compact('polisis'));
    }

    public function showContentCreator()
    {
        // Mengambil data pelamar dengan posisi Content Creator
        $contentCreators = ContentCreator::all();
        return view('content-creator', compact('contentCreators'));
    }
}

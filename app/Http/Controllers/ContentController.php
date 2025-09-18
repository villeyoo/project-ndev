<?php
namespace App\Http\Controllers;

use App\Models\ContentCreator;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        // Ambil semua data Content Creator
        $contentCreators = ContentCreator::all();

        // Kirim data ke view (tanpa folder)
        return view('content-creator', compact('contentCreators'));  // 'index' sesuai nama view di resources/views
    }

    public function show($id)
    {
        $contentCreator = ContentCreator::findOrFail($id); // Menemukan Content Creator berdasarkan ID
        return view('content-creator.show', compact('contentCreator')); // Kirim data ke view show
    }

    public function destroy($id)
    {
        $contentCreator = ContentCreator::findOrFail($id); // Temukan Content Creator
        $contentCreator->delete(); // Hapus Content Creator

        return redirect()->route('content-creator.index')->with('success', 'Content Creator berhasil dihapus!');
    }

      public function verify($id)
    {
        $contentCreator = ContentCreator::findOrFail($id); // Ambil data Content Creator berdasarkan ID
        return view('verify', compact('contentCreator')); // Kirim data ke view tanpa folder
    }


public function updateStatus(Request $request, $id)
{
    $contentCreator = ContentCreator::findOrFail($id); // Ambil data Content Creator berdasarkan ID

    // Validasi status pengajuan (diterima atau ditolak)
    $validated = $request->validate([
        'status' => 'required|in:diterima,ditolak', // Validasi hanya status yang diterima
    ]);

    // Update status pengajuan
    $contentCreator->status = $validated['status'];
    $contentCreator->save(); // Simpan perubahan status

    // Redirect kembali ke daftar Content Creator dengan pesan sukses
    return redirect()->route('content-creator.index')->with('success', 'Status pengajuan berhasil diperbarui!');
}



    // Method untuk store (menyimpan data Content Creator)
public function store(Request $request)
{
    // Validasi data dari form
    $validated = $request->validate([
        'tiktok' => 'required|url',
        'discord' => 'required|string',
        'followers' => 'required|integer',
    ]);

    // Menyimpan data Content Creator
    ContentCreator::create($validated);

    // Redirect ke halaman utama (root) setelah berhasil menambahkan Content Creator
     return redirect('/hire')->with('success', 'Pendaftaran Content Creator berhasil!')->with('swal', true);
}
}

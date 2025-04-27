<?php

namespace App\Http\Controllers;

use App\Models\AlatCamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlatCampingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'namaAlat' => 'required|string|max:255',
            'kategoriAlat' => 'required|string',
            'jumlahAlat' => 'required|integer|min:1',
            'hargaSewa' => 'required|string',
            'deskripsiAlat' => 'nullable|string',
            'gambarAlat' => 'required|image|mimes:jpeg,png,jpg,gif|max:5210',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambarAlat')) {
            $gambarPath = $request->file('gambarAlat')->store('images', 'public');
        }

        AlatCamping::create([
            'nama_alat' => $request->namaAlat,
            'kategori' => $request->kategoriAlat,
            'jumlah' => $request->jumlahAlat,
            'harga_sewa' => $request->hargaSewa,
            'deskripsi' => $request->deskripsiAlat,
            'gambar' => $gambarPath,
        ]);

        return redirect()->back()->with('success', 'Data alat camping berhasil ditambahkan!');
    }

    public function show($id)
    {
        $alatCamping = AlatCamping::findOrFail($id);  // Mengambil data berdasarkan ID alat

        return view('admin.alat-camping.views.detail-alat', compact('alatCamping'));
    }

    public function index()
    {
        $alatCamping = AlatCamping::all(); // Ambil semua data dari tabel alat_camping

        return view('admin.alat-camping.views.daftar-alat', compact('alatCamping'));
    }

    public function create()
    {
        return view('admin.alat-camping.views.tambah-alat');
        // Sesuaikan view-nya ke tempat form tambah alat kamu.
    }

    public function edit($id) {}
}

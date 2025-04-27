<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;

class AlatCampingController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'namaAlat' => 'required|string|max:255',
            'kategoriAlat' => 'required|string',
            'jumlahAlat' => 'required|integer|min:1',
            'hargaSewa' => 'required|string',
            'deskripsiAlat' => 'nullable|string',
            'gambarAlat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25600',  // 25MB dalam byte
        ]);

        // Menghilangkan format 'Rp', titik, dan spasi dari harga sewa
        $harga = (int) str_replace(['Rp', '.', ' '], '', $request->hargaSewa);

        // Menyimpan gambar jika ada gambar yang di-upload
        $gambarPath = null;
        if ($request->hasFile('gambarAlat')) {
            // Simpan gambar di folder 'public/storage/alat_camping' dan dapatkan path-nya
            $gambarPath = $request->file('gambarAlat')->store('alat_camping', 'public');
        }

        // Menyimpan data alat camping ke database
        AlatCamping::create([
            'nama_alat' => $request->namaAlat,
            'kategori' => $request->kategoriAlat,
            'jumlah' => $request->jumlahAlat,
            'harga_sewa' => $harga,
            'deskripsi' => $request->deskripsiAlat,
            'gambar' => 'storage/' . $gambarPath,  // Menyimpan path relatif
        ]);

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->route('alat-camping.create')->with('success', 'Data alat camping berhasil ditambahkan!');
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
}

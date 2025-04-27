<?php

namespace App\Http\Controllers;

use App\Models\AlatCamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlatCampingController extends Controller
{
    public function index()
    {
        $alatCamping = AlatCamping::all();
        return view('admin.alat-camping.views.daftar-alat', compact('alatCamping'));
    }

    public function create()
    {
        return view('admin.alat-camping.views.tambah-alat');
    }

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
        $alatCamping = AlatCamping::findOrFail($id);
        return view('admin.alat-camping.views.detail-alat', compact('alatCamping'));
    }

    public function update(Request $request, $id)
    {
        $alat = AlatCamping::findOrFail($id);

        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string',
            'jumlah' => 'required|integer|min:0',
            'harga_sewa' => 'required|numeric|min:0',
        ]);

        $alat->update([
            'nama_alat' => $request->nama_alat,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'harga_sewa' => $request->harga_sewa,
        ]);

        $kategoriLabels = [
            'tent' => 'Tent and Accessories',
            'sleeping' => 'Sleeping Equipment',
            'cooking' => 'Cooking Equipment',
            'lighting' => 'Lighting',
            'backpack' => 'Backpack',
            'safety' => 'Safety Gear',
            'navigation' => 'Navigation and Tools',
        ];

        return response()->json([
            'nama_alat' => $alat->nama_alat,
            'deskripsi' => $alat->deskripsi,
            'kategori' => $alat->kategori,
            'kategori_label' => $kategoriLabels[$alat->kategori] ?? $alat->kategori,
            'jumlah' => $alat->jumlah,
            'harga_sewa' => $alat->harga_sewa,
        ]);
    }

    // Menampilkan daftar alat yang sudah dihapus
    public function trashed()
    {
        $alatTrashed = AlatCamping::onlyTrashed()->get();
        return view('admin.alat-camping.views.trashed-alat', compact('alatTrashed'));
    }

    // Restore alat yang sudah dihapus
    public function restore($id)
    {
        $alat = AlatCamping::onlyTrashed()->findOrFail($id);
        $alat->restore();

        return redirect()->route('alat-camping.trashed')->with('success', 'Data berhasil dipulihkan.');
    }

    // Hapus permanen alat
    public function forceDelete($id)
    {
        $alat = AlatCamping::onlyTrashed()->findOrFail($id);
        $alat->forceDelete();

        return redirect()->route('alat-camping.trashed')->with('success', 'Data berhasil dihapus permanen.');
    }

    public function softDelete($id)
    {
        $alat = AlatCamping::findOrFail($id);

        // Melakukan soft delete dengan mengatur 'deleted_at'
        $alat->delete();

        return redirect()->route('alat-camping.index')->with('success', 'Alat camping berhasil dihapus.');
    }
}

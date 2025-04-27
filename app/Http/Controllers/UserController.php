<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index(Request $request)
    {
        // Ambil data pengguna dengan pagination
        $users = User::paginate(10);

        if ($request->ajax()) {
            return response()->json(view('admin.customer.partials.table', compact('users'))->render());
        }

        return view('admin.customer.views.list-customer', compact('users'));
    }

    // Mengunduh data pengguna dalam format CSV
    public function downloadCSV()
    {
        // Ambil data pengguna
        $users = User::all();

        // Pastikan ada data pengguna
        if ($users->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data pengguna.'], 404);
        }

        // Header CSV
        $csvContent = "ID,Nama,Email\n";

        // Tambahkan data pengguna ke dalam CSV
        foreach ($users as $user) {
            $csvContent .= "{$user->id},{$user->name},{$user->email}\n";
        }

        // Buat response CSV
        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_pengguna.csv"',
        ]);
    }
}

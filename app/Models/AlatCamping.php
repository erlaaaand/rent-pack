<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatCamping extends Model
{
    use HasFactory;

    protected $table = 'alat_camping';

    protected $fillable = [
        'nama_alat',
        'kategori',
        'jumlah',
        'deskripsi',
        'harga_sewa',
        'gambar',
    ];
}

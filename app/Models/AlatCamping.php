<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AlatCamping extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'alat_camping';

    protected $fillable = [
        'nama_alat',
        'kategori',
        'jumlah',
        'deskripsi',
        'harga_sewa',
        'gambar',
    ];

    public function setHargaSewaAttribute($value)
    {
        $this->attributes['harga_sewa'] = (int)preg_replace('/[^0-9]/', '', $value);
    }
}

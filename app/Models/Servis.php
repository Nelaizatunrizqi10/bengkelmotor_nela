<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function KategoriService()
    {
        return $this->belongsTo(KategoriService::class, 'id_kategori');
    }
    public function Profile()
    {
        return $this->belongsTo(Profile::class, 'id_profil');
    }
    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

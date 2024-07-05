<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriService extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable =[
        'nama_kategori',
        'deskripsi',
        'biaya'
    ];
}

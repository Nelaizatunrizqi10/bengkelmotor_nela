<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembukuan extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function Akun()
    {
        return $this->belongsTo(Akun::class, 'id_akuns');
    }
    public function Servis()
    {
        return $this->belongsTo(Servis::class, 'id_servis');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table = 'penggajian';
    protected $primaryKey = [
        'id_komponen_gaji',
        'id_anggota'
    ];
    
    public $incrementing = false;
    protected $keyType = 'int';
    
    protected $fillable = [
        'id_komponen_gaji',
        'id_anggota'    
    ];
}

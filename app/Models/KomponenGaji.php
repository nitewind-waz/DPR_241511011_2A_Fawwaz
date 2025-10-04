<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomponenGaji extends Model
{
    protected $table = 'komponen_gaji';
    protected $primaryKey = 'id_komponen_gaji';
    public $incrementing = false;
    protected $keyType = 'int';

    public $timestamps = false; 
    
    protected $fillable = [
        'id_komponen_gaji',
        'nama_komponen',
        'kategori',
        'jabatan',
        'nominal',
        'satuan',
    ];

    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'penggajian', 'id_komponen_gaji', 'id_anggota');
    }

}

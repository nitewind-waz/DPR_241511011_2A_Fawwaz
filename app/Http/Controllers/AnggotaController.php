<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function adminIndex()
    {
        $anggota = Anggota::all();
        return view('admin.anggota.index', compact('anggota'));
    }
}

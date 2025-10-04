<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class PenggajianPublicController extends Controller
{
    // Menampilkan semua anggota dengan ringkasan gaji
    public function index()
    {
        $anggota = Anggota::with('komponenGaji')->get();
        return view('public.penggajian.index', compact('anggota'));
    }

    // Menampilkan detail penggajian per anggota
    public function show($id_anggota)
    {
        $anggota = Anggota::with('komponenGaji')->where('id_anggota', $id_anggota)->first();

        if (!$anggota) {
            abort(404, 'Data anggota tidak ditemukan.');
        }

        return view('public.penggajian.show', compact('anggota'));
    }
}

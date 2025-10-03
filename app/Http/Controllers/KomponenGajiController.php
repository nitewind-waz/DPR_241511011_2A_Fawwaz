<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomponenGaji;

class KomponenGajiController extends Controller
{
    public function adminIndex() 
    {
        $kGaji = KomponenGaji::all();
        return view('admin.komponengaji.index', compact('kGaji'));
    }

    public function create()
    {
        return view('admin.komponengaji.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_komponen' => 'required|string|max:100',
            'kategori' => 'required',
            'jabatan' => 'required',
            'nominal' => 'required|numeric',
            'satuan' => 'required',
        ]);

        // Ambil id terakhir
        $lastId = KomponenGaji::max('id_komponen_gaji');
        $newId = $lastId ? $lastId + 1 : 1;

        KomponenGaji::create([
            'id_komponen_gaji' => $newId,
            'nama_komponen' => $request->nama_komponen,
            'kategori' => $request->kategori,
            'jabatan' => $request->jabatan,
            'nominal' => $request->nominal,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('admin.komponen_gaji.index')
                         ->with('success', 'Komponen gaji berhasil ditambahkan!');
    }
}

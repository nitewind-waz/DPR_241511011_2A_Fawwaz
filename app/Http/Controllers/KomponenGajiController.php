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
            'kategori' => 'required|string|in:Gaji Pokok,Tunjangan Melekat,Tunjangan Lain',
            'jabatan' => 'required|Semua,Ketua,Anggota,Wakil Ketua',
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

    public function destroy($id_komponen_gaji)
    {
        $kGaji = KomponenGaji::findOrFail($id_komponen_gaji);
        $kGaji->delete();

        return redirect()->route('admin.komponen_gaji.index')->with('success', 'Komponen gaji deleted successfully!');
    }

    public function edit($id_komponen_gaji)
    {
        $komponen = KomponenGaji::findOrFail($id_komponen_gaji);
        return view('admin.komponengaji.edit', compact('komponen'));
    }

    public function update(Request $request, $id_komponen_gaji)
    {
        // Validasi input
        $request->validate([
            'nama_komponen' => 'required|string|max:100',
            'kategori' => 'required|string|in:Gaji Pokok,Tunjangan Melekat,Tunjangan Lain',
            'jabatan' => 'required|string|in:Semua,Ketua,Anggota,Wakil Ketua',
            'nominal' => 'required|numeric',
            'satuan' => 'required|string|max:50',
        ]);

        // Ambil data yang mau diupdate
        $komponen = KomponenGaji::findOrFail($id_komponen_gaji);

        // Update data
        $komponen->update([
            'nama_komponen' => $request->nama_komponen,
            'kategori'      => $request->kategori,
            'jabatan'       => $request->jabatan,
            'nominal'       => $request->nominal,
            'satuan'        => $request->satuan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.komponen_gaji.index')
                        ->with('success', 'Komponen gaji berhasil diperbarui!');
    }

}

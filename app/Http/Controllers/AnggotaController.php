<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function adminIndex()
    {
        // Mengambil semua row
        $anggota = Anggota::all();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

   public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_depan'        => 'required|string|max:100',
            'nama_belakang'     => 'nullable|string|max:100',
            'gelar_depan'       => 'nullable|string|max:50',
            'gelar_belakang'    => 'nullable|string|max:50',
            'jabatan'           => 'required|string|in:Ketua,Wakil Ketua,Anggota',
            'status_pernikahan' => 'required|string|in:Kawin,Belum Kawin',
        ]);

        // Ambil id terakhir, lalu +1
        $lastId = Anggota::max('id_anggota');  
        $newId = $lastId ? $lastId + 1 : 101; // kalau kosong mulai dari 101
        
        // Simpan data baru dengan id_anggota manual
        Anggota::create([
            'id_anggota'        => $newId,
            'nama_depan'        => $request->nama_depan,
            'nama_belakang'     => $request->nama_belakang,
            'gelar_depan'       => $request->gelar_depan,
            'gelar_belakang'    => $request->gelar_belakang,
            'jabatan'           => $request->jabatan,
            'status_pernikahan' => $request->status_pernikahan,
        ]);
        
        return redirect()->route('admin.anggota.index')
                        ->with('success', 'Data anggota berhasil ditambahkan!');
    }

    public function destroy($id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        $anggota->delete();

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota deleted successfully!');
    }

    public function edit($id_anggota)
    {
        $anggota = Anggota::findOrfail($id_anggota);
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id_anggota)
    {
        $request->validate([
            'nama_depan'        => 'required|string|max:100',
            'nama_belakang'     => 'nullable|string|max:100',
            'gelar_depan'       => 'nullable|string|max:50',
            'gelar_belakang'    => 'nullable|string|max:50',
            'jabatan'           => 'required|string|in:Ketua,Wakil Ketua,Anggota',
            'status_pernikahan' => 'required|string|in:Kawin,Belum Kawin',
        ]);

        $anggota = Anggota::findOrFail($id_anggota);

        $anggota->update([
            'nama_depan'        => $request->nama_depan,
            'nama_belakang'     => $request->nama_belakang,
            'gelar_depan'       => $request->gelar_depan,
            'gelar_belakang'    => $request->gelar_belakang,
            'jabatan'           => $request->jabatan,
            'status_pernikahan' => $request->status_pernikahan,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota updated successfully!');
    }

}

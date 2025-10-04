<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\KomponenGaji;

class PenggajianController extends Controller
{
    // POV ADMIN
    public function adminIndex(Request $request)
    {
        $search = $request->input('search');
        $data = Anggota::with('komponenGaji')
            ->when($search, function ($query, $search) {
                $query->where('nama_depan', 'ILIKE', "%{$search}%")
                      ->orWhere('nama_belakang', 'ILIKE', "%{$search}%");
            })
            ->get();

        return view('admin.penggajian.index', compact('data'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        $komponen = KomponenGaji::all();
        return view('admin.penggajian.create', compact('anggota', 'komponen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'komponen' => 'required|array',
        ]);

        $anggota = Anggota::findOrFail($request->id_anggota);
        $anggota->komponenGaji()->sync($request->komponen);

        return redirect()->route('admin.penggajian.index')->with('success', 'Data penggajian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota = Anggota::with('komponenGaji')->findOrFail($id);
        $komponen = KomponenGaji::all();

        return view('admin.penggajian.edit', compact('anggota', 'komponen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'komponen' => 'required|array',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->komponenGaji()->sync($request->komponen);

        return redirect()->route('admin.penggajian.index')->with('success', 'Data penggajian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->komponenGaji()->detach();

        return redirect()->route('admin.penggajian.index')->with('success', 'Data penggajian berhasil dihapus!');
    }
}

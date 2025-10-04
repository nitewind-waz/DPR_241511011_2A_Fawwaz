<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\KomponenGaji;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function create()
    {
        $anggota = Anggota::all();
        $komponen = KomponenGaji::all();

        return view('penggajian.create', compact('anggota', 'komponen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_komponen_gaji' => 'required|array',
            'id_komponen_gaji.*' => 'exists:komponen_gaji,id_komponen_gaji',
        ]);

        $anggota = Anggota::findOrFail($request->id_anggota);

        // attach banyak komponen gaji ke anggota
        $anggota->komponenGaji()->syncWithoutDetaching($request->id_komponen_gaji);

        return redirect()->route('admin.penggajian.index')->with('success', 'Penggajian berhasil ditambahkan.');
    }

    public function index(Request $request)
    {
        $query = \App\Models\Anggota::with('komponenGaji');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama_depan', 'ILIKE', "%{$search}%")
                ->orWhere('nama_belakang', 'ILIKE', "%{$search}%");
            });
        }

        $data = $query->get();

        return view('penggajian.index', compact('data'));
    }

}

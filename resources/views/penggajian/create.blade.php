@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Penggajian</h2>

    <form action="{{ route('admin.penggajian.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pilih Anggota</label>
            <select name="id_anggota" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id_anggota }}">{{ $a->nama_depan }} {{ $a->nama_belakang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilih Komponen Gaji</label>
            <select name="id_komponen_gaji[]" class="form-control" multiple required>
                @foreach($komponen as $k)
                    <option value="{{ $k->id_komponen_gaji }}">{{ $k->nama_komponen }} - Rp{{ $k->nominal }}</option>
                @endforeach
            </select>
            <small class="text-muted">Gunakan CTRL / SHIFT untuk memilih lebih dari satu</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.penggajian.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

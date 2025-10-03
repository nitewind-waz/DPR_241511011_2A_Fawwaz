@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Anggota</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.anggota.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Depan</label>
            <input type="text" name="nama_depan" 
                   class="form-control" 
                   value="{{ old('nama_depan') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Belakang</label>
            <input type="text" name="nama_belakang" 
                   class="form-control" 
                   value="{{ old('nama_belakang') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gelar Depan</label>
            <input type="text" name="gelar_depan" 
                   class="form-control" 
                   value="{{ old('gelar_depan') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gelar Belakang</label>
            <input type="text" name="gelar_belakang" 
                   class="form-control" 
                   value="{{ old('gelar_belakang') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-control" required>
                <option value="">-- Pilih Jabatan --</option>
                <option value="Ketua" {{ old('jabatan') == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="Wakil Ketua" {{ old('jabatan') == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="Anggota" {{ old('jabatan') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Pernikahan</label>
            <select name="status_pernikahan" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Kawin" {{ old('status_pernikahan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Belum Kawin" {{ old('status_pernikahan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

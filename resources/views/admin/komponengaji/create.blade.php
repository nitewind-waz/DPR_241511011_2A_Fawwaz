@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Komponen Gaji</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.komponen_gaji.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Komponen</label>
            <input type="text" name="nama_komponen" class="form-control" value="{{ old('nama_komponen') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" step="0.01" name="nominal" class="form-control" value="{{ old('nominal') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Satuan</label>
            <input type="text" name="satuan" class="form-control" value="{{ old('satuan') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.komponen_gaji.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Penggajian - {{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}</h2>

    <form action="{{ route('admin.penggajian.update', $anggota->id_anggota) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" value="{{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilih Komponen Gaji</label><br>
            @foreach($komponen as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" 
                           name="komponen[]" value="{{ $item->id_komponen_gaji }}"
                           {{ in_array($item->id_komponen_gaji, $anggota->komponenGaji->pluck('id_komponen_gaji')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label">
                        {{ $item->nama_komponen }} (Rp{{ number_format($item->nominal, 2, ',', '.') }})
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.penggajian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

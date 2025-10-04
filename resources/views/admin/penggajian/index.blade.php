@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Penggajian</h2>

    {{-- Search --}}
    <form action="{{ route('admin.penggajian.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" name="search" value="{{ request('search') }}" 
               class="form-control me-2" placeholder="Cari nama anggota...">
        <button type="submit" class="btn btn-primary">Cari</button>
        @if(request('search'))
            <a href="{{ route('admin.penggajian.index') }}" class="btn btn-secondary ms-2">Reset</a>
        @endif
    </form>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Nama Anggota</th>
                <th>Komponen Gaji</th>
                <th>Total Gaji</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $anggota)
                <tr>
                    <td>{{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($anggota->komponenGaji as $komponen)
                                <li>{{ $komponen->nama_komponen }} (Rp{{ number_format($komponen->nominal, 2, ',', '.') }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td><strong>Rp{{ number_format($anggota->komponenGaji->sum('nominal'), 2, ',', '.') }}</strong></td>
                    <td>
                        <a href="{{ route('admin.penggajian.edit', $anggota->id_anggota) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.penggajian.destroy', $anggota->id_anggota) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data penggajian ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>a
    </table>

    <a href="{{ route('admin.penggajian.create') }}" class="btn btn-primary mt-2">Tambah Penggajian</a>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3>{{ $anggota->nama_depan }} {{ $anggota->nama_belakang }}</h3>
            <p class="text-muted">{{ $anggota->jabatan }}</p>

            <h5 class="mt-4">Rincian Komponen Gaji:</h5>
            <ul>
                @forelse($anggota->komponenGaji as $komponen)
                    <li>
                        <strong>{{ $komponen->nama_komponen }}</strong> 
                        ({{ $komponen->kategori }}) —
                        Rp{{ number_format($komponen->nominal, 2, ',', '.') }} / {{ $komponen->satuan }}
                    </li>
                @empty
                    <li class="text-muted">Belum ada komponen gaji.</li>
                @endforelse
            </ul>

            <hr>
            <h5>Total Gaji: Rp{{ number_format($anggota->komponenGaji->sum('nominal'), 2, ',', '.') }}</h5>

            <a href="{{ route('penggajian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection

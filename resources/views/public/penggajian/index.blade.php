@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Daftar Penggajian Anggota</h2>

    {{-- Search Bar --}}
    <form action="{{ route('penggajian.index') }}" method="GET" class="mb-4 d-flex justify-content-center">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control w-50 me-2"
               placeholder="Cari nama anggota...">
        <button type="submit" class="btn btn-primary">Cari</button>
        @if(request('search'))
            <a href="{{ route('penggajian.index') }}" class="btn btn-secondary ms-2">Reset</a>
        @endif
    </form>

    {{-- Cards --}}
    <div class="row">
        @forelse($anggota as $agt)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $agt->nama_depan }} {{ $agt->nama_belakang }}</h5>
                        <p class="card-text text-muted mb-2">
                            <strong>Jabatan:</strong> {{ $agt->jabatan }}<br>
                            <strong>Status:</strong> {{ $agt->status_pernikahan }}
                        </p>
                        <p class="mb-3"><strong>Total Gaji:</strong> 
                            Rp{{ number_format($agt->komponenGaji->sum('nominal'), 2, ',', '.') }}
                        </p>
                        <a href="{{ route('penggajian.show', $agt->id_anggota) }}" 
                           class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Tidak ada data penggajian ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection

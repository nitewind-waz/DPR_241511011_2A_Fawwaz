@extends('layouts.app')

<style>
body {
    background-color: #f3f4f6;
    font-family: 'Inter', sans-serif;
}

.dashboard-container {
    padding: 3rem 0;
}

.dashboard-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    border: none;
    overflow: hidden;
    padding: 2rem;
}

.welcome-header {
    text-align: center;
    margin-bottom: 2rem;
}

.welcome-header h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #111827;
}

.welcome-header p {
    color: #6b7280;
    font-size: 1.1rem;
}

.management-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
}

.management-card {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.25s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.management-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    background-color: #fff;
}

.management-card i {
    font-size: 2rem;
    color: #007bff;
    margin-bottom: 1rem;
}

.management-card h5 {
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.5rem;
}

.management-card p {
    font-size: 0.95rem;
    color: #6b7280;
    margin-bottom: 1rem;
}

.management-card a {
    text-decoration: none;
    display: inline-block;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    background-color: #007bff;
    color: white;
    font-weight: 500;
    transition: background-color 0.2s ease;
}

.management-card a:hover {
    background-color: #0056b3;
}

.logout-btn {
    display: block;
    width: 100%;
    margin-top: 2rem;
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.75rem;
    font-weight: 500;
    transition: background-color 0.2s ease;
}

.logout-btn:hover {
    background-color: #bb2d3b;
}
</style>

@section('content')
<div class="dashboard-container">
    <div class="container">
        <div class="dashboard-card">
            <div class="welcome-header">
                <h2>Selamat datang, {{ Auth::user()->nama_depan }}</h2>
                <p>Anda masuk sebagai <strong>{{ Auth::user()->role }}</strong></p>
            </div>

            {{-- Jika Admin --}}
            @if (Auth::user()->role == 'Admin')
                <div class="management-grid">
                    <div class="management-card">
                        <i class="bi bi-people-fill"></i>
                        <h5>Kelola Anggota</h5>
                        <p>Tambah, edit, dan hapus data anggota.</p>
                        <a href="{{ route('admin.anggota.index') }}">Kelola</a>
                    </div>

                    <div class="management-card">
                        <i class="bi bi-cash-coin"></i>
                        <h5>Kelola Komponen Gaji</h5>
                        <p>Atur jenis gaji, tunjangan, dan satuannya.</p>
                        <a href="{{ route('admin.komponen_gaji.index') }}">Kelola</a>
                    </div>

                    <div class="management-card">
                        <i class="bi bi-wallet2"></i>
                        <h5>Kelola Penggajian</h5>
                        <p>Proses dan kelola data penggajian anggota.</p>
                        <a href="{{ route('admin.penggajian.index') }}">Kelola</a>
                    </div>
                </div>

            {{-- Jika Bukan Admin --}}
            @else
                <div class="management-grid">
                    <div class="management-card">
                        <i class="bi bi-cash-stack"></i>
                        <h5>Lihat Penggajian DPR</h5>
                        <p>Lihat rincian gaji dan tunjangan anggota DPR.</p>
                        <a href="{{ route('penggajian.index') }}">Lihat</a>
                    </div>
                </div>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection

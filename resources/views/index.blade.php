@extends('layouts.app')

<script>

</script>

<style>
body {
    background-color: #f8f9fa;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.dashboard-container {
    padding: 2rem 0;
}

.dashboard-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border: 1px solid #e9ecef;
    margin-bottom: 2rem;
}

.card-header-simple {
    background: white;
    border-bottom: 1px solid #e9ecef;
    padding: 1.5rem 2rem;
    border-radius: 12px 12px 0 0;
}

.card-header-simple h3 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
    color: #212529;
}

.card-body-simple {
    padding: 2rem;
}

.welcome-text {
    color: #495057;
    font-size: 1.25rem;
    margin-bottom: 1.5rem;
}

.user-info {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.user-info p {
    margin: 0.5rem 0;
    color: #495057;
    font-size: 1rem;
}

.user-info strong {
    color: #212529;
}

.role-description {
    color: #6c757d;
    font-size: 1rem;
    margin-bottom: 1.5rem;
}

.btn-simple {
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    display: inline-block;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
    color: white;
    text-decoration: none;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
    color: white;
    text-decoration: none;
}
</style>

@section('content')
<div class="dashboard-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="dashboard-card">
                    <div class="card-body-simple">
                        <h5 class="welcome-text">Selamat datang <strong>{{ Auth::user()->nama_depan }}</strong>!</h5>

                        @if (Auth::user()->role == 'Public')
                            
                        @elseif (Auth::user()->role == 'Admin')
                            <a href="{{ route('admin.anggota.index') }}" class="btn-simple btn-primary">
                                Kelola Students
                            </a>
                        @endif
                        <div class="mt-auto">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
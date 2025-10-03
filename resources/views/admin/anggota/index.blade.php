@extends('layouts.app')
{{--  --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Anggota Management</h2>
    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status Pernikahan</th>
                <th style="width: 100px;">Edit</th>
                <th style="width: 100px;">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $agt)
            <tr>
                <td> {{ $agt->gelar_depan }} {{ $agt->nama_depan }} {{ $agt->nama_belakang }} {{ $agt->gelar_belakang }}</td>
                <td> {{ $agt->jabatan }} </td>
                <td> {{ $agt->status_pernikahan }} </td>
                <td>
                    <p>
                    {{-- <a href="{{ route('admin.anggota.edit', $agt->anggota_id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                </td>
                <td>
                    <form action="{{ route('admin.anggota.destroy', $agt->id_anggota) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.anggota.create') }}" class="btn btn-warning btn-sm">Add Anggota</a>
</div>
@endsection

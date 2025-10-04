@extends('layouts.app')
{{--  --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Komponen Gaji Management</h2>
    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Komponen</th>
                <th>Kategori</th>
                <th>Jabatan</th>
                <th>Nominal</th>
                <th>Satuan</th>
                <th style="width: 100px;">Edit</th>
                <th style="width: 100px;">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kGaji as $k)
            <tr>
                <td> {{ $k->id_komponen_gaji }}</td>
                <td> {{ $k->nama_komponen }} </td>
                <td> {{ $k->kategori }} </td>
                <td> {{ $k->jabatan }} </td>
                <td> {{ $k->nominal }} </td>
                <td> {{ $k->satuan }} </td>
                <td>
                    <a href="{{ route('admin.komponen_gaji.edit', $k->id_komponen_gaji) }}" class="d-inline btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.komponen_gaji.destroy', $k->id_komponen_gaji) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.komponen_gaji.create') }}" class="btn btn-warning btn-sm">Add</a>
</div>
@endsection

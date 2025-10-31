@extends('layouts.master')
@section('title', 'Daftar Departemen')

@section('content')
<div class="container mt-5">

    {{-- 1. Membuat tombol dan judul jadi sejajar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Departemen</h1>
        {{-- Mengubah link <a> menjadi tombol biru (btn-primary) --}}
        <a href="{{ route('departments.create') }}" class="btn btn-primary">Tambah Departemen</a>
    </div>

    {{-- 2. Menerapkan style Bootstrap pada tabel --}}
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop data departments --}}
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->nama_departemen }}</td>
                <td>
                    {{-- 3. Mengubah aksi menjadi tombol-tombol kecil --}}
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 4. Memperbaiki tampilan pagination --}}
    <div class="mt-3">
        {!! $departments->links() !!}
    </div>

</div>
@endsection
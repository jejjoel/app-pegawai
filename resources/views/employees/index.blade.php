@extends('layouts.master')
@section('title', 'Daftar Pegawai')

@section('content')
<div class="container mt-5">

    {{-- =============================================== --}}
    {{-- !! 1. MEMBUAT TOMBOL DAN JUDUL JADI SEJAJAR !! --}}
    {{-- =============================================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Pegawai</h1>
        {{-- Mengubah link <a> menjadi tombol biru (btn-primary) --}}
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Pegawai</a>
    </div>

    {{-- =============================================== --}}
    {{-- !! 2. MENERAPKAN STYLE BOOTSTRAP PADA TABEL !! --}}
    {{-- =============================================== --}}
    <table class="table table-striped table-hover">
        {{-- Header tabel dibuat gelap (table-dark) --}}
        <thead class="table-dark">
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->department?->nama_departemen }}</td>
                <td>{{ $employee->position?->nama_jabatan }}</td>
                <td>{{ $employee->status }}</td>
                <td>
                    {{-- =============================================== --}}
                    {{-- !! 3. MENGUBAH AKSI MENJADI TOMBOL-TOMBOL KECIL !! --}}
                    {{-- =============================================== --}}
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                        {{-- btn-sm = tombol kecil --}}
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- =============================================== --}}
    {{-- !! 4. MEMPERBAIKI TAMPILAN PAGINATION !! --}}
    {{-- =============================================== --}}
    <div class="mt-3">
        {{-- Bootstrap 5 secara otomatis men-style pagination Laravel --}}
        {!! $employees->links() !!}
    </div>

</div>
@endsection
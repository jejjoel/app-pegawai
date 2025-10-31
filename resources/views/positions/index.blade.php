@extends('layouts.master')
@section('title', 'Daftar Jabatan')

@section('content')
<div class="container mt-5">

    {{-- 1. Membuat tombol dan judul jadi sejajar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Jabatan</h1>
        {{-- Mengubah link <a> menjadi tombol biru (btn-primary) --}}
        <a href="{{ route('positions.create') }}" class="btn btn-primary">Tambah Jabatan</a>
    </div>

    {{-- 2. Menerapkan style Bootstrap pada tabel --}}
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop data positions --}}
            @foreach($positions as $position)
            <tr>
                <td>{{ $position->nama_jabatan }}</td>
                <td>{{ $position->gaji_pokok }}</td>
                <td>
                    {{-- 3. Mengubah aksi menjadi tombol-tombol kecil --}}
                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
                        <a href="{{ route('positions.show', $position->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
        {!! $positions->links() !!}
    </div>

</div>
@endsection
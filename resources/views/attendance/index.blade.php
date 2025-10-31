@extends('layouts.master')
@section('title', 'Daftar Absensi')

@section('content')
<div class="container mt-5">

    {{-- 1. Membuat tombol dan judul jadi sejajar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Absensi</h1>
        {{-- Mengubah link <a> menjadi tombol biru (btn-primary) --}}
        <a href="{{ route('attendance.create') }}" class="btn btn-primary">Tambah Absensi</a>
    </div>

    {{-- 2. Menerapkan style Bootstrap pada tabel --}}
    {{-- table-responsive akan membuat tabel bisa di-scroll horizontal di HP --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Absensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop data attendance --}}
                @foreach($attendances as $att)
                <tr>
                    <td>{{ $att->employee?->nama_lengkap }}</td>
                    <td>{{ $att->tanggal }}</td>
                    <td>{{ $att->waktu_masuk }}</td>
                    <td>{{ $att->waktu_keluar }}</td>
                    <td>{{ $att->status_absensi }}</td>
                    <td>
                        {{-- 3. Mengubah aksi menjadi tombol-tombol kecil --}}
                        <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" class="d-inline">
                            <a href="{{ route('attendance.show', $att->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('attendance.edit', $att->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 4. Memperbaiki tampilan pagination --}}
    <div class="mt-3">
        {!! $attendances->links() !!}
    </div>

</div>
@endsection
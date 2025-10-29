@extends('layouts.master')
@section('title', 'Daftar Absensi')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Absensi</h1>

    <a href="{{ route('attendance.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Absensi</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
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
                {{-- Tampilkan nama karyawan dari relasi 'employee' --}}
                <td>{{ $att->employee?->nama_lengkap }}</td>
                <td>{{ $att->tanggal }}</td>
                <td>{{ $att->waktu_masuk }}</td>
                <td>{{ $att->waktu_keluar }}</td>
                <td>{{ $att->status_absensi }}</td>

                <td>
                    <a href="{{ route('attendance.show', $att->id) }}">Detail</a> |
                    <a href="{{ route('attendance.edit', $att->id) }}">Edit</a> |
                    <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Untuk link pagination --}}
    <div class="mt-3">
        {!! $attendances->links() !!}
    </div>

</div>
@endsection
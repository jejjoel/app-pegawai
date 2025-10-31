@extends('layouts.master')
@section('title', 'Daftar Gaji')

@section('content')
<div class="container mt-5">

    {{-- 1. Membuat tombol dan judul jadi sejajar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Gaji</h1>
        {{-- Mengubah link <a> menjadi tombol biru (btn-primary) --}}
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">Tambah Data Gaji</a>
    </div>

    {{-- 2. Menerapkan style Bootstrap pada tabel --}}
    {{-- table-responsive akan membuat tabel bisa di-scroll horizontal di HP --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop data salaries --}}
                @foreach($salaries as $salary)
                <tr>
                    <td>{{ $salary->employee?->nama_lengkap }}</td>
                    <td>{{ $salary->bulan }}</td>
                    <td>{{ $salary->gaji_pokok }}</td>
                    <td>{{ $salary->tunjangan }}</td>
                    <td>{{ $salary->potongan }}</td>
                    <td>{{ $salary->total_gaji }}</td>
                    <td>
                        {{-- 3. Mengubah aksi menjadi tombol-tombol kecil --}}
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                            <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
        {!! $salaries->links() !!}
    </div>

</div>
@endsection
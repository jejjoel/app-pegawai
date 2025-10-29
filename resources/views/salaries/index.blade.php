@extends('layouts.master')
@section('title', 'Daftar Gaji')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Gaji</h1>

    <a href="{{ route('salaries.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Data Gaji</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
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
                {{-- Tampilkan nama karyawan dari relasi 'employee' --}}
                <td>{{ $salary->employee?->nama_lengkap }}</td>
                <td>{{ $salary->bulan }}</td>
                <td>{{ $salary->gaji_pokok }}</td>
                <td>{{ $salary->tunjangan }}</td>
                <td>{{ $salary->potongan }}</td>
                <td>{{ $salary->total_gaji }}</td>

                <td>
                    <a href="{{ route('salaries.show', $salary->id) }}">Detail</a> |
                    <a href="{{ route('salaries.edit', $salary->id) }}">Edit</a> |
                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
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
        {!! $salaries->links() !!}
    </div>

</div>
@endsection
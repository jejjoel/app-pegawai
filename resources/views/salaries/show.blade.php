@extends('layouts.master')
@section('title', 'Detail Gaji')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Gaji</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $salary->id }}</td>
        </tr>
        <tr>
            <th>Karyawan</th>
            {{-- Tampilkan nama dari relasi --}}
            <td>{{ $salary->employee?->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Bulan</th>
            <td>{{ $salary->bulan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>{{ $salary->gaji_pokok }}</td>
        </tr>
        <tr>
            <th>Tunjangan</th>
            <td>{{ $salary->tunjangan }}</td>
        </tr>
        <tr>
            <th>Potongan</th>
            <td>{{ $salary->potongan }}</td>
        </tr>
        <tr>
            <th>Total Gaji</th>
            <td>{{ $salary->total_gaji }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $salary->created_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('salaries.index') }}">Kembali ke Daftar</a>
</div>
@endsection
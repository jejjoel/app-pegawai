@extends('layouts.master')
@section('title', 'Detail Jabatan')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Jabatan</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $position->id }}</td>
        </tr>
        <tr>
            <th>Nama Jabatan</th>
            <td>{{ $position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>{{ $position->gaji_pokok }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $position->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate Pada</th>
            <td>{{ $position->updated_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('positions.index') }}">Kembali ke Daftar</a>
</div>
@endsection
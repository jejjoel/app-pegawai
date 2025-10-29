@extends('layouts.master')
@section('title', 'Detail Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Departemen</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $department->id }}</td>
        </tr>
        <tr>
            <th>Nama Departemen</th>
            <td>{{ $department->nama_departemen }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $department->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate Pada</th>
            <td>{{ $department->updated_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('departments.index') }}">Kembali ke Daftar</a>
</div>
@endsection
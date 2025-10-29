@extends('layouts.master')
@section('title', 'Tambah Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Departemen Baru</h1>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf <table cellpadding="5">
            <tr>
                <td><label for="nama_departemen">Nama Departemen</label></td>
                <td><input type="text" id="nama_departemen" name="nama_departemen" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection
@extends('layouts.master')
@section('title', 'Tambah Jabatan')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Jabatan Baru</h1>

    <form action="{{ route('positions.store') }}" method="POST">
        @csrf <table cellpadding="5">
            <tr>
                <td><label for="nama_jabatan">Nama Jabatan</label></td>
                <td><input type="text" id="nama_jabatan" name="nama_jabatan" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok</label></td>
                <td><input type="number" id="gaji_pokok" name="gaji_pokok" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection
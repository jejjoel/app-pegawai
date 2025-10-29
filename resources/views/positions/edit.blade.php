@extends('layouts.master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Jabatan</h1>

    {{-- Arahkan action ke route 'update' dan kirim ID --}}
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf @method('PUT') <table cellpadding="5">
            <tr>
                <td><label for="nama_jabatan">Nama Jabatan</label></td>
                <td>
                    {{-- Tampilkan data lama di 'value' --}}
                    <input type="text" id="nama_jabatan" name="nama_jabatan"
                        value="{{ $position->nama_jabatan }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok</label></td>
                <td>
                    {{-- Tampilkan data lama di 'value' --}}
                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ $position->gaji_pokok }}" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection
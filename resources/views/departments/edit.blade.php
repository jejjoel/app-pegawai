@extends('layouts.master')
@section('title', 'Edit Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Departemen</h1>

    {{-- Arahkan action ke route 'update' dan kirim ID --}}
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf @method('PUT') <table cellpadding="5">
            <tr>
                <td><label for="nama_departemen">Nama Departemen</label></td>
                <td>
                    {{-- Tampilkan data lama di 'value' --}}
                    <input type="text" id="nama_departemen" name="nama_departemen"
                        value="{{ $department->nama_departemen }}" required>
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
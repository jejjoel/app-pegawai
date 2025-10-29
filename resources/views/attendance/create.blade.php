@extends('layouts.master')
@section('title', 'Tambah Absensi')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Data Absensi</h1>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf <table cellpadding="5">
            <tr>
                <td><label for="karyawan_id">Karyawan</label></td>
                <td>
                    <select id="karyawan_id" name="karyawan_id" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal</label></td>
                <td><input type="date" id="tanggal" name="tanggal" required></td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk</label></td>
                <td><input type="time" id="waktu_masuk" name="waktu_masuk"></td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Waktu Keluar</label></td>
                <td><input type="time" id="waktu_keluar" name="waktu_keluar"></td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status Absensi</label></td>
                <td>
                    <select id="status_absensi" name="status_absensi" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection 
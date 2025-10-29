@extends('layouts.master')
@section('title', 'Edit Absensi')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Data Absensi</h1>

    {{-- Arahkan action ke route 'update' dan kirim ID --}}
    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf @method('PUT') <table cellpadding="5">
            <tr>
                <td><label for="karyawan_id">Karyawan</label></td>
                <td>
                    <select id="karyawan_id" name="karyawan_id" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                        {{-- Tambahkan logika 'selected' --}}
                        <option value="{{ $emp->id }}"
                            {{ old('karyawan_id', $attendance->karyawan_id) == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal</label></td>
                <td>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $attendance->tanggal) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk</label></td>
                <td>
                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
                </td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Waktu Keluar</label></td>
                <td>
                    <input type="time" id="waktu_keluar" name="waktu_keluar"
                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                </td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status Absensi</label></td>
                <td>
                    <select id="status_absensi" name="status_absensi" required>
                        @php
                        $statuses = ['hadir', 'izin', 'sakit', 'alpha'];
                        @endphp
                        @foreach($statuses as $status)
                        {{-- Tambahkan logika 'selected' --}}
                        <option value="{{ $status }}"
                            {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                        @endforeach
                    </select>
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
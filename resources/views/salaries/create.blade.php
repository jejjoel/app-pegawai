@extends('layouts.master')
@section('title', 'Tambah Data Gaji')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Data Gaji</h1>

    <form action="{{ route('salaries.store') }}" method="POST">
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
                <td><label for="bulan">Bulan</label></td>
                <td><input type="month" id="bulan" name="bulan" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok</label></td>
                {{-- Beri 'id' dan 'value="0"' --}}
                <td><input type="number" id="gaji_pokok" name="gaji_pokok" value="0" required></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan</label></td>
                {{-- Beri 'id' --}}
                <td><input type="number" id="tunjangan" name="tunjangan" value="0"></td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan</label></td>
                {{-- Beri 'id' --}}
                <td><input type="number" id="potongan" name="potongan" value="0"></td>
            </tr>
            <tr>
                <td><label for="total_gaji">Total Gaji</label></td>
                {{-- Beri 'id' dan 'readonly' --}}
                <td><input type="number" id="total_gaji" name="total_gaji" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // 1. Ambil elemen input
    const gajiPokokEl = document.getElementById('gaji_pokok');
    const tunjanganEl = document.getElementById('tunjangan');
    const potonganEl = document.getElementById('potongan');
    const totalGajiEl = document.getElementById('total_gaji');

    // 2. Buat fungsi untuk menghitung
    function hitungTotalGaji() {
        // Ambil nilai, ubah ke angka. Jika kosong, anggap 0.
        const pokok = parseFloat(gajiPokokEl.value) || 0;
        const tunjangan = parseFloat(tunjanganEl.value) || 0;
        const potongan = parseFloat(potonganEl.value) || 0;

        const total = (pokok + tunjangan) - potongan;

        // Set nilai field 'total_gaji'
        totalGajiEl.value = total;
    }

    // 3. Panggil fungsi 'hitungTotalGaji' setiap kali ada ketikan
    gajiPokokEl.addEventListener('input', hitungTotalGaji);
    tunjanganEl.addEventListener('input', hitungTotalGaji);
    potonganEl.addEventListener('input', hitungTotalGaji);

    // 4. Hitung sekali saat halaman dimuat (untuk mengisi nilai awal)
    hitungTotalGaji();
</script>
@endpush
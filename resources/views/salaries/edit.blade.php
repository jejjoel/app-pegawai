@extends('layouts.master')
@section('title', 'Edit Data Gaji')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Data Gaji</h1>

    {{-- Arahkan action ke 'update' dan tambahkan @method('PUT') --}}
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table cellpadding="5">
            <tr>
                <td><label for="karyawan_id">Karyawan</label></td>
                <td>
                    <select id="karyawan_id" name="karyawan_id" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                        {{-- Tambahkan logika 'selected' --}}
                        <option value="{{ $emp->id }}"
                            {{ old('karyawan_id', $salary->karyawan_id) == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Bulan</label></td>
                {{-- Isi 'value' dengan data lama --}}
                <td><input type="month" id="bulan" name="bulan"
                        value="{{ old('bulan', $salary->bulan) }}" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok</label></td>
                {{-- Isi 'value' dengan data lama --}}
                <td><input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan</label></td>
                {{-- Isi 'value' dengan data lama --}}
                <td><input type="number" id="tunjangan" name="tunjangan"
                        value="{{ old('tunjangan', $salary->tunjangan) }}"></td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan</label></td>
                {{-- Isi 'value' dengan data lama --}}
                <td><input type="number" id="potongan" name="potongan"
                        value="{{ old('potongan', $salary->potongan) }}"></td>
            </tr>
            <tr>
                <td><label for="total_gaji">Total Gaji</label></td>
                {{-- Isi 'value' dengan data lama dan 'readonly' --}}
                <td><input type="number" id="total_gaji" name="total_gaji"
                        value="{{ old('total_gaji', $salary->total_gaji) }}" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const gajiPokokEl = document.getElementById('gaji_pokok');
    const tunjanganEl = document.getElementById('tunjangan');
    const potonganEl = document.getElementById('potongan');
    const totalGajiEl = document.getElementById('total_gaji');

    function hitungTotalGaji() {
        const pokok = parseFloat(gajiPokokEl.value) || 0;
        const tunjangan = parseFloat(tunjanganEl.value) || 0;
        const potongan = parseFloat(potonganEl.value) || 0;

        const total = (pokok + tunjangan) - potongan;

        // Set nilai field 'total_gaji'
        totalGajiEl.value = total;
    }

    gajiPokokEl.addEventListener('input', hitungTotalGaji);
    tunjanganEl.addEventListener('input', hitungTotalGaji);
    potonganEl.addEventListener('input', hitungTotalGaji);

    hitungTotalGaji();
</script>
@endpush
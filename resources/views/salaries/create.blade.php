<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Tambah Data Gaji</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! Sepertinya ada yang salah:</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Karyawan</label>
                <select id="karyawan_id" name="karyawan_id" class="form-select" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>{{ $emp->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan</label>
                <input type="month" id="bulan" name="bulan" class="form-control" value="{{ old('bulan') }}" required>
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control" value="{{ old('gaji_pokok', 0) }}" required>
            </div>
            <div class="mb-3">
                <label for="tunjangan" class="form-label">Tunjangan</label>
                <input type="number" id="tunjangan" name="tunjangan" class="form-control" value="{{ old('tunjangan', 0) }}">
            </div>
            <div class="mb-3">
                <label for="potongan" class="form-label">Potongan</label>
                <input type="number" id="potongan" name="potongan" class="form-control" value="{{ old('potongan', 0) }}">
            </div>
            <div class="mb-3">
                <label for="total_gaji" class="form-label">Total Gaji</label>
                <input type="number" id="total_gaji" name="total_gaji" class="form-control" readonly>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- ========================================================= --}}
    {{-- !! KODE JAVASCRIPT DIPINDAHKAN KE SINI !! --}}
    {{-- ========================================================= --}}
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
            totalGajiEl.value = total;
        }

        gajiPokokEl.addEventListener('input', hitungTotalGaji);
        tunjanganEl.addEventListener('input', hitungTotalGaji);
        potonganEl.addEventListener('input', hitungTotalGaji);
        
        hitungTotalGaji(); // Hitung saat halaman dimuat
    </script>
</body>
</html>
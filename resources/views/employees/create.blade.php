<!DOCTYPE html>
<html>

<head>
    <title>Form Input Pegawai</title>
    {{-- 1. TAMBAHKAN LINK BOOTSTRAP CSS & META VIEWPORT --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    {{-- 2. BUNGKUS KONTEN DENGAN CONTAINER BOOTSTRAP --}}
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Form Pegawai</h1>

        @if ($errors->any())
        {{-- 3. UBAH TAMPILAN ERROR MENJADI 'ALERT' BOOTSTRAP --}}
        <div class="alert alert-danger">
            <strong>Whoops! Sepertinya ada yang salah:</strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            {{-- 4. TERAPKAN KELAS FORM BOOTSTRAP --}}
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                {{-- Gunakan 'form-select' untuk dropdown --}}
                <select id="status" name="status" class="form-select">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="departemen_id" class="form-label">Departemen:</label>
                <select id="departemen_id" name="departemen_id" class="form-select" required>
                    <option value="">-- Pilih Departemen --</option>
                    @foreach($departments as $dept)
                    <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>{{ $dept->nama_departemen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jabatan_id" class="form-label">Jabatan:</label>
                <select id="jabatan_id" name="jabatan_id" class="form-select" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($positions as $pos)
                    <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>{{ $pos->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>

            {{-- 5. UBAH TOMBOL MENJADI BOOTSTRAP --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </form>
    </div>

    {{-- 6. TAMBAHKAN LINK BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Pegawai</title>
    {{-- 1. TAMBAHKAN LINK BOOTSTRAP CSS & META VIEWPORT --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    {{-- 2. BUNGKUS KONTEN DENGAN CONTAINER BOOTSTRAP (mt-5 mb-5) --}}
    <div class="container mt-5 mb-5">
        <h2>Edit Data Pegawai</h2>

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

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- 4. TERAPKAN KELAS FORM BOOTSTRAP --}}
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $employee->alamat) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="departemen_id" class="form-label">Departemen:</label>
                <select id="departemen_id" name="departemen_id" class="form-select" required>
                    <option value="">-- Pilih Departemen --</option>
                    @foreach($departments as $dept)
                    <option value="{{ $dept->id }}"
                        {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}>
                        {{ $dept->nama_departemen }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jabatan_id" class="form-label">Jabatan:</label>
                <select id="jabatan_id" name="jabatan_id" class="form-select" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($positions as $pos)
                    <option value="{{ $pos->id }}"
                        {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}>
                        {{ $pos->nama_jabatan }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- 5. UBAH TOMBOL MENJADI BOOTSTRAP --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
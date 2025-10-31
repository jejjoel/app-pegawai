<!DOCTYPE html>
<html>

<head>
    <title>Detail Pegawai</title>
    {{-- 1. TAMBAHKAN LINK BOOTSTRAP CSS & META VIEWPORT --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    {{-- 2. BUNGKUS KONTEN DENGAN CONTAINER BOOTSTRAP (mt-5 mb-5) --}}
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Detail Pegawai</h1>

        {{-- 3. GUNAKAN CARD DAN LIST GROUP BOOTSTRAP UNTUK TAMPILAN YANG RAPI --}}
        <div class="card">
            <div class="card-header">
                <h3>{{ $employee->nama_lengkap }}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Email:</b> {{ $employee->email }}</li>
                <li class="list-group-item"><b>Nomor Telepon:</b> {{ $employee->nomor_telepon }}</li>
                <li class="list-group-item"><b>Tanggal Lahir:</b> {{ $employee->tanggal_lahir }}</li>
                <li class="list-group-item"><b>Alamat:</b> {{ $employee->alamat }}</li>
                <li class="list-group-item"><b>Tanggal Masuk:</b> {{ $employee->tanggal_masuk }}</li>
                <li class="list-group-item"><b>Departemen:</b> {{ $employee->department?->nama_departemen }}</li>
                <li class="list-group-item"><b>Jabatan:</b> {{ $employee->position?->nama_jabatan }}</li>
                <li class="list-group-item"><b>Status:</b> {{ $employee->status }}</li>
            </ul>
        </div>

        {{-- 4. UBAH TOMBOL MENJADI BOOTSTRAP --}}
        <br>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
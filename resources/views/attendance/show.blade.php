<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Detail Absensi</h1>

        <div class="card">
            <div class="card-header">
                <h3>Informasi Detail</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID:</b> {{ $attendance->id }}</li>
                <li class="list-group-item"><b>Karyawan:</b> {{ $attendance->employee?->nama_lengkap }}</li>
                <li class="list-group-item"><b>Tanggal:</b> {{ $attendance->tanggal }}</li>
                <li class="list-group-item"><b>Waktu Masuk:</b> {{ $attendance->waktu_masuk }}</li>
                <li class="list-group-item"><b>Waktu Keluar:</b> {{ $attendance->waktu_keluar }}</li>
                <li class="list-group-item"><b>Status Absensi:</b> {{ $attendance->status_absensi }}</li>
                <li class="list-group-item"><b>Dibuat Pada:</b> {{ $attendance->created_at }}</li>
            </ul>
        </div>

        <br>
        <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
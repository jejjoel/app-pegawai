<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Detail Gaji</h1>

        <div class="card">
            <div class="card-header">
                <h3>Informasi Detail</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID:</b> {{ $salary->id }}</li>
                <li class="list-group-item"><b>Karyawan:</b> {{ $salary->employee?->nama_lengkap }}</li>
                <li class="list-group-item"><b>Bulan:</b> {{ $salary->bulan }}</li>
                <li class="list-group-item"><b>Gaji Pokok:</b> {{ $salary->gaji_pokok }}</li>
                <li class="list-group-item"><b>Tunjangan:</b> {{ $salary->tunjangan }}</li>
                <li class="list-group-item"><b>Potongan:</b> {{ $salary->potongan }}</li>
                <li class="list-group-item"><b>Total Gaji:</b> {{ $salary->total_gaji }}</li>
                <li class="list-group-item"><b>Dibuat Pada:</b> {{ $salary->created_at }}</li>
            </ul>
        </div>

        <br>
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Detail Jabatan</h1>

        <div class="card">
            <div class="card-header">
                <h3>Informasi Detail</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID:</b> {{ $position->id }}</li>
                <li class="list-group-item"><b>Nama Jabatan:</b> {{ $position->nama_jabatan }}</li>
                <li class="list-group-item"><b>Gaji Pokok:</b> {{ $position->gaji_pokok }}</li>
                <li class="list-group-item"><b>Dibuat Pada:</b> {{ $position->created_at }}</li>
                <li class="list-group-item"><b>Diupdate Pada:</b> {{ $position->updated_at }}</li>
            </ul>
        </div>

        <br>
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
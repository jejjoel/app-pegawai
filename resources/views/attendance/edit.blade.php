<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Edit Data Absensi</h1>

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

        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Karyawan</label>
                <select id="karyawan_id" name="karyawan_id" class="form-select" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($employees as $emp)
                    <option value="{{ $emp->id }}"
                        {{ old('karyawan_id', $attendance->karyawan_id) == $emp->id ? 'selected' : '' }}>
                        {{ $emp->nama_lengkap }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control"
                    value="{{ old('tanggal', $attendance->tanggal) }}" required>
            </div>
            <div class="mb-3">
                <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                <input type="time" id="waktu_masuk" name="waktu_masuk" class="form-control"
                    value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
            </div>
            <div class="mb-3">
                <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                <input type="time" id="waktu_keluar" name="waktu_keluar" class="form-control"
                    value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
            </div>
            <div class="mb-3">
                <label for="status_absensi" class="form-label">Status Absensi</label>
                <select id="status_absensi" name="status_absensi" class="form-select" required>
                    @php
                    $statuses = ['hadir', 'izin', 'sakit', 'alpha'];
                    @endphp
                    @foreach($statuses as $status)
                    <option value="{{ $status }}"
                        {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
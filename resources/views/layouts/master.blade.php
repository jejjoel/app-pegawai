<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>

    {{-- =============================================== --}}
    {{-- !! 1. TAMBAHKAN LINK BOOTSTRAP CSS !! --}}
    {{-- =============================================== --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <header>
        {{-- Kita akan pindahkan ini ke sidebar nanti, tapi untuk sekarang biarkan --}}
        <h1>@yield('page-title', 'App Pegawai')</h1>

        <nav>
            <ul>
                <li><a href="{{ route('employees.index') }}">Employee</a></li>
                <li><a href="{{ route('departments.index') }}">Department</a></li>
                <li><a href="{{ route('positions.index') }}">Position</a></li>
                <li><a href="{{ route('attendance.index') }}">Attendance</a></li>
                <li><a href="{{ route('salaries.index') }}">Salaries</a></li>
            </ul>
        </nav>
    </header>

    {{-- Kita bungkus konten dengan container Bootstrap agar lebih rapi --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="container mt-5">
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>

    {{-- =============================================== --}}
    {{-- !! 2. TAMBAHKAN LINK BOOTSTRAP JS (dan @stack) !! --}}
    {{-- =============================================== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
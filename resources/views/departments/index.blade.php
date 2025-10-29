@extends('layouts.master')
@section('title', 'Daftar Departemen')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Departemen</h1>

    <a href="{{ route('departments.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Departemen</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop data departments --}}
            @foreach($departments as $department)
            <tr>
                {{-- Tampilkan nama departemen --}}
                <td>{{ $department->nama_departemen }}</td>

                <td>
                    {{-- Ubah 'employees.' menjadi 'departments.' dan $employee->id menjadi $department->id --}}
                    <a href="{{ route('departments.show', $department->id) }}">Detail</a> |
                    <a href="{{ route('departments.edit', $department->id) }}">Edit</a> |
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Ini untuk menampilkan link pagination (Hal 1, 2, 3...) --}}
    <div class="mt-3">
        {!! $departments->links() !!}
    </div>

</div>
@endsection
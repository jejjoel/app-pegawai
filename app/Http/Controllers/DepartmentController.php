<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->paginate(5); // Ambil data

        // Kirim data ke view di 'resources/views/departments/index.blade.php'
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments',
        ]);

        // Simpan data ke database
        Department::create([
            'nama_departemen' => $request->nama_departemen,
        ]);

        // Arahkan kembali ke halaman index
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari departemen berdasarkan ID
        $department = Department::findOrFail($id);

        // Tampilkan view 'show.blade.php' dan kirim datanya
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari departemen berdasarkan ID
        $department = Department::findOrFail($id);

        // Tampilkan view form edit dan kirim data departemen tadi
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'unique' di sini harus mengecualikan ID saat ini
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $id,
        ]);

        // Cari departemen
        $department = Department::findOrFail($id);

        // Update datanya
        $department->update([
            'nama_departemen' => $request->nama_departemen,
        ]);

        // Arahkan kembali ke halaman index
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari departemen berdasarkan ID
        $department = Department::findOrFail($id);

        // Hapus data
        $department->delete();

        // Arahkan kembali ke halaman index
        return redirect()->route('departments.index');
    }
}

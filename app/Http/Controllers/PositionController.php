<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::latest()->paginate(5); // Ambil data

        // Kirim data ke view di 'resources/views/positions/index.blade.php'
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions',
            'gaji_pokok' => 'required|numeric|min:0', // Validasi untuk angka
        ]);

        // Simpan data ke database
        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        // Arahkan kembali ke halaman index
        return redirect()->route('positions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari jabatan berdasarkan ID
        $position = Position::findOrFail($id);

        // Tampilkan view 'show.blade.php' dan kirim datanya
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari jabatan berdasarkan ID
        $position = Position::findOrFail($id);

        // Tampilkan view form edit dan kirim data jabatan tadi
        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            // 'unique' di sini harus mengecualikan ID saat ini
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $id,
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        // Cari jabatan
        $position = Position::findOrFail($id);

        // Update datanya
        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        // Arahkan kembali ke halaman index
        return redirect()->route('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari jabatan berdasarkan ID
        $position = Position::findOrFail($id);

        // Hapus data
        $position->delete();

        // Arahkan kembali ke halaman index
        return redirect()->route('positions.index');
    }
}

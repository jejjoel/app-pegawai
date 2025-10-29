<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data gaji, urutkan dari yang terbaru
        // 'with('employee')' akan mengambil data karyawan yang terhubung
        $salaries = Salary::with('employee')->latest()->paginate(10);

        // Kirim data ke view
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all(); // Ambil semua data karyawan

        // Kirim data karyawan ke view
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        // 1. Validasi
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|date_format:Y-m', // Validasi format kalender bulan
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            // 'total_gaji' tidak perlu divalidasi karena kita hitung di server
        ]);

        // 2. Ambil data
        $data = $request->all();

        // 3. Hitung total gaji di server (PENTING!)
        $gaji_pokok = $data['gaji_pokok'] ?? 0;
        $tunjangan = $data['tunjangan'] ?? 0;
        $potongan = $data['potongan'] ?? 0;

        $data['total_gaji'] = ($gaji_pokok + $tunjangan) - $potongan;

        // 4. Simpan
        Salary::create($data);

        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data gaji LENGKAP dengan relasi karyawannya
        $salary = Salary::with('employee')->findOrFail($id);

        // Tampilkan view 'show.blade.php' dan kirim datanya
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 2. TAMBAHKAN KODE INI:
        $salary = Salary::findOrFail($id); // Cari data gaji
        $employees = Employee::all();     // Ambil semua karyawan untuk dropdown

        // Kirim data gaji dan karyawan ke view edit
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data (sama seperti 'store')
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|date_format:Y-m',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        // Ambil data yang sudah divalidasi
        $data = $request->all();

        $gaji_pokok = $data['gaji_pokok'] ?? 0;
        $tunjangan = $data['tunjangan'] ?? 0;
        $potongan = $data['potongan'] ?? 0;

        $data['total_gaji'] = ($gaji_pokok + $tunjangan) - $potongan;

        // Cari data gaji dan update
        $salary = Salary::findOrFail($id);
        $salary->update($data);

        // Arahkan kembali ke halaman index
        return redirect()->route('salaries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data gaji berdasarkan ID
        $salary = Salary::findOrFail($id);

        // Hapus data
        $salary->delete();

        // Arahkan kembali ke halaman index
        return redirect()->route('salaries.index');
    }
}

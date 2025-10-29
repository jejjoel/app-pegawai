<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data absensi, urutkan dari yang terbaru
        // 'with('employee')' akan mengambil data karyawan yang terhubung
        $attendances = Attendance::with('employee')->latest()->paginate(10);

        // Kirim data ke view
        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all(); // Ambil semua data karyawan

        // Kirim data karyawan ke view
        return view('attendance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'waktu_masuk' => $request->waktu_masuk ?: null,
            'waktu_keluar' => $request->waktu_keluar ?: null,
        ]);

        $rules = [
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ];

        if ($request->filled('waktu_masuk') && $request->filled('waktu_keluar')) {
            $rules['waktu_keluar'] .= '|after:waktu_masuk';
        }

        // 4. Jalankan validasi
        $request->validate($rules);

        // 5. Simpan
        Attendance::create($request->all());
        return redirect()->route('attendance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari absensi LENGKAP dengan relasi karyawannya
        $attendance = Attendance::with('employee')->findOrFail($id);

        // Tampilkan view 'show.blade.php' dan kirim datanya
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari absensi berdasarkan ID
        $attendance = Attendance::findOrFail($id);
        // Ambil semua data karyawan untuk dropdown
        $employees = Employee::all();

        // Tampilkan view form edit dan kirim datanya
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'waktu_masuk' => $request->waktu_masuk ?: null,
            'waktu_keluar' => $request->waktu_keluar ?: null,
        ]);

        $rules = [
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable', // <-- HAPUS date_format
            'waktu_keluar' => 'nullable', // <-- HAPUS date_format
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ];

        if ($request->filled('waktu_masuk') && $request->filled('waktu_keluar')) {
            $rules['waktu_keluar'] .= '|after:waktu_masuk';
        }

        // 4. Jalankan validasi
        $request->validate($rules);

        // 5. Simpan
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendance.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari absensi berdasarkan ID
        $attendance = Attendance::findOrFail($id);

        // Hapus data
        $attendance->delete();

        // Arahkan kembali ke halaman index
        return redirect()->route('attendance.index');
    }
}

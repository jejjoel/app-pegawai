<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];

    /**
     * Relasi ke model Employee (satu absensi punya satu karyawan)
     */
    public function employee()
    {
        // 'karyawan_id' adalah foreign key di tabel attendance
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}

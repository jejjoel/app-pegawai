<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'departemen_id',
        'jabatan_id',
    ];

    /**
     * Relasi ke model Department (satu karyawan punya satu departemen)
     */
    public function department()
    {
        // 'departemen_id' adalah foreign key di tabel employees
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    /**
     * Relasi ke model Position (satu karyawan punya satu jabatan)
     */
    public function position()
    {
        // 'jabatan_id' adalah foreign key di tabel employees
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    /**
     * Relasi ke model Attendance (satu karyawan punya banyak absensi)
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }
}

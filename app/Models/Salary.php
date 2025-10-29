<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];


    /**
     * Relasi ke model Employee (satu data gaji punya satu karyawan).
     */
    public function employee()
    {
        // 'karyawan_id' adalah foreign key di tabel salaries.
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
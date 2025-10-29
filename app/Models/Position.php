<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    // TAMBAHKAN BARIS-BARIS INI
    protected $fillable = [
        'nama_jabatan',
        'gaji_pokok',
    ];

    // Relasi ke model Position (satu jabatan punya banyak karyawan)
    public function employees()
    {
        return $this->hasMany(Position::class, 'jabatan_id');
    }
}

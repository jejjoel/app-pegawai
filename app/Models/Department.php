<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // TAMBAHKAN BARIS-BARIS INI
    protected $fillable = [
        'nama_departemen',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'departemen_id');
    }
}

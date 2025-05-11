<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'nama_karyawan',
        'clock_in',
        'clock_out',
        'overtime',
        'picture',
        'location',
        'notes'
    ];

    protected $casts = [
        'clock_in' => 'datetime',
        'clock_out' => 'datetime'
    ];
}
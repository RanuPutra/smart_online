<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'employee_id',
        'clock_in',
        'clock_out',
        'overtime',
        'lokasi_id',
        'notes'
    ];

    protected $casts = [
        'clock_in' => 'datetime',
        'clock_out' => 'datetime'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
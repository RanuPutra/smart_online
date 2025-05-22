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
<<<<<<< HEAD
=======
        'lokasi_id',
>>>>>>> 32aac47af41cda5da2c1fcd3ea900aa9b5cc707f
        'clock_in',
        'clock_out',
        'overtime',
        'picture',
<<<<<<< HEAD
        'lokasi_id',
=======
>>>>>>> 32aac47af41cda5da2c1fcd3ea900aa9b5cc707f
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
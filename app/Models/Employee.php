<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'nama',
        'jabatan',
        'departemen',
        'email',
        'nomor_telepon',
        'alamat',
        'tanggal_bergabung',
        'foto'
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date'
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}

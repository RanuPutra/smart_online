<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id_karyawan',
        'nama',
        'jabatan',
        'departemen',
        'email',
        'nomor_telepon',
        'alamat',
        'tanggal_bergabung',
        'foto',
        'jenis_kelamin',
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date',
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
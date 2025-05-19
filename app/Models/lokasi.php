<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $table = 'lokasis';
    protected $fillable = ['nama_lokasi', 'alamat'];


    public function absensis()
{
    return $this->hasMany(Absensi::class);
}

}

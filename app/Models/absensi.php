<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Absensi extends Model
{
    protected $fillable = [
        'employee_id',
        'lokasi_id',
        'clock_in',
        'clock_out',
        'overtime',
        'notes',
    ];

    protected $casts = [
        'clock_in' => 'datetime',
        'clock_out' => 'datetime',
        'overtime' => 'datetime:H:i:s', // Format time untuk overtime
    ];

    // Relasi dengan Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relasi dengan Lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    // Mutator untuk clock_out: hitung overtime saat clock_out diset
    public function setClockOutAttribute($value)
    {
        $this->attributes['clock_out'] = $value;

        // Reset overtime terlebih dahulu
        $this->attributes['overtime'] = '00:00:00';

        // Hitung overtime hanya jika clock_in dan clock_out ada
        if ($this->clock_in && $value) {
            $clockIn = Carbon::parse($this->clock_in);
            $clockOut = Carbon::parse($value);

            // Tentukan jam kerja normal (10:00 - 17:00)
            $normalEndTime = $clockIn->copy()->setTime(17, 0, 0); // Gunakan copy untuk menghindari modifikasi asli

            // Debugging (hapus setelah selesai)
            \Log::info('Debug - clock_in: ' . $clockIn->toDateTimeString());
            \Log::info('Debug - clock_out: ' . $clockOut->toDateTimeString());
            \Log::info('Debug - normalEndTime: ' . $normalEndTime->toDateTimeString());

            // Pastikan clock_out tidak sebelum clock_in
            if ($clockOut->lessThan($clockIn)) {
                return; // Abaikan jika clock_out sebelum clock_in
            }

            // Hitung overtime hanya jika clock_out lebih dari jam 17:00
            if ($clockOut->greaterThan($normalEndTime)) {
                $overtimeInterval = $clockOut->diff($normalEndTime); // Gunakan diff untuk interval positif
                $overtimeSeconds = $overtimeInterval->s + ($overtimeInterval->i * 60) + ($overtimeInterval->h * 3600);

                $overtimeHours = floor($overtimeSeconds / 3600);
                $overtimeMinutes = floor(($overtimeSeconds % 3600) / 60);
                $overtimeSeconds = $overtimeSeconds % 60;

                // Format overtime sebagai time (HH:mm:ss)
                $this->attributes['overtime'] = sprintf('%02d:%02d:%02d', $overtimeHours, $overtimeMinutes, $overtimeSeconds);
            }
        } else {
            $this->attributes['overtime'] = null;
        }
    }

    // Accessor untuk mendapatkan overtime dalam format jam (opsional)
    public function getOvertimeHoursAttribute()
    {
        if (!$this->overtime || $this->overtime === '00:00:00') {
            return '0 jam';
        }

        $overtime = Carbon::parse($this->overtime);
        $hours = $overtime->hour;
        $minutes = $overtime->minute;

        if ($minutes > 0) {
            return "{$hours} jam {$minutes} menit";
        }
        return "{$hours} jam";
    }
}
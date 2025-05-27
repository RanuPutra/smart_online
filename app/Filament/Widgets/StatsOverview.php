<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use App\Models\Employee;
use App\Models\Lokasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $today = now()->toDateString();
        $absenHariIni = Absensi::whereDate('clock_in', $today)->count();
        $employeeIdsWithAbsensi = Absensi::whereDate('clock_in', $today)
            ->pluck('employee_id')
            ->toArray();
        $ygGaHadir = Employee::whereNotIn('id', $employeeIdsWithAbsensi)->count();
        $onTimeThreshold = Carbon::createFromFormat('Y-m-d H:i:s', $today . ' 08:00:00');
        $onTime = Absensi::whereDate('clock_in', $today)
            ->where('clock_in', '<=', $onTimeThreshold)
            ->count();
        $lateArrival = Absensi::whereDate('clock_in', $today)
            ->where('clock_in', '>', $onTimeThreshold)
            ->count();
        $totalLokasi = Lokasi::count();

        return [
            Stat::make('Absen Hari Ini', $absenHariIni),
            Stat::make('Yg Ga Hadir', $ygGaHadir),
            Stat::make('On-Time', $onTime),
            Stat::make('Late Arrival', $lateArrival),
        ];
    }

    // Ubah dari protected ke public
    public function getColumnSpan(): int
    {
        return 5; // Span 5 kolom
    }
}
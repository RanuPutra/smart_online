<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\Lokasi;
use App\Models\Absensi;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;

class CustomDashboardWidget extends Widget
{
    protected static string $view = 'filament.widgets.custom-dashboard-widget';

    protected function getViewData(): array
    {
        $today = now()->toDateString();
        $absenHariIni = Absensi::whereDate('clock_in', $today)->count();
        $employeeIdsWithAbsensi = Absensi::whereDate('clock_in', $today)->pluck('employee_id')->toArray();
        $ygGaHadir = Employee::whereNotIn('id', $employeeIdsWithAbsensi)->count();

        $onTimeThreshold = Carbon::createFromFormat('Y-m-d H:i:s', $today . ' 08:00:00');
        $onTime = Absensi::whereDate('clock_in', $today)->where('clock_in', '<=', $onTimeThreshold)->count();
        $lateArrival = Absensi::whereDate('clock_in', $today)->where('clock_in', '>', $onTimeThreshold)->count();

        $totalEmployee = Employee::count();
        $lakiLaki = Employee::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Employee::where('jenis_kelamin', 'Perempuan')->count();
        $totalLokasi = Lokasi::count();

        $stats = [
            ['label' => 'Absen Hari Ini', 'value' => $absenHariIni, 'icon' => 'heroicon-o-check-circle'],
            ['label' => 'Yg Ga Hadir', 'value' => $ygGaHadir, 'icon' => 'heroicon-o-x-circle'],
            ['label' => 'On-Time', 'value' => $onTime, 'icon' => 'heroicon-o-clock'],
            ['label' => 'Late Arrival', 'value' => $lateArrival, 'icon' => 'heroicon-o-exclamation'],
            ['label' => 'Total Karyawan', 'value' => $totalEmployee, 'icon' => 'heroicon-o-users'],
            ['label' => 'Laki-Laki', 'value' => $lakiLaki, 'icon' => 'heroicon-o-user'],
            ['label' => 'Perempuan', 'value' => $perempuan, 'icon' => 'heroicon-o-user'],
            ['label' => 'Total Lokasi', 'value' => $totalLokasi, 'icon' => 'heroicon-o-map-pin'],
        ];

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $monthlyData = Absensi::selectRaw('DAY(clock_in) as day, COUNT(*) as total')
            ->whereBetween('clock_in', [$startOfMonth, $endOfMonth])
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day')
            ->toArray();

        $monthlyLabels = range(1, $endOfMonth->day);
        $monthlyValues = array_map(fn($day) => $monthlyData[$day] ?? 0, $monthlyLabels);

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $weeklyData = Absensi::selectRaw('DAYNAME(clock_in) as day, COUNT(*) as total')
            ->whereBetween('clock_in', [$startOfWeek, $endOfWeek])
            ->groupBy('day')
            ->orderByRaw("FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->pluck('total', 'day')
            ->toArray();

        $weeklyLabels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $weeklyMap = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $weeklyValues = array_map(fn($day) => $weeklyData[$day] ?? 0, $weeklyMap);

        return [
            'stats' => $stats,
            'monthlyChart' => [
                'labels' => $monthlyLabels,
                'datasets' => [[
                    'label' => 'Jumlah Absensi Bulanan',
                    'data' => $monthlyValues,
                    'backgroundColor' => '#4B5EAA',
                    'borderColor' => '#4B5EAA',
                ]],
            ],
            'weeklyChart' => [
                'labels' => $weeklyLabels,
                'datasets' => [[
                    'label' => 'Jumlah Absensi Mingguan',
                    'data' => $weeklyValues,
                    'backgroundColor' => '#4B5EAA',
                    'borderColor' => '#4B5EAA',
                ]],
            ],
        ];
    }
}

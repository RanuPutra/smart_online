<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use App\Models\Employee;
use App\Models\Lokasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;
    protected ?string $heading = '...';
    protected ?string $description = '...';

    protected function getStats(): array
    {
        $absensiCount = Absensi::whereDate('clock_in', now()->toDateString())->count();
        \Log::info('Absensi Count: ' . $absensiCount); 

        return [
            Stat::make('Total Absensi', Absensi::whereDate('clock_in', now()->toDateString())->count())
                ->description('Karyawan yang absen hari ini')
                ->descriptionIcon('heroicon-m-clock')
                ->chart([17, 2, 10, 3, 15, 4, 17])
                ->color('primary'),

            Stat::make('Total Karyawan', Employee::count())
                ->description('Jumlah seluruh karyawan')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Total Lokasi', Lokasi::count())
                ->description('Jumlah lokasi kerja')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('warning'),
        ];
    }
}
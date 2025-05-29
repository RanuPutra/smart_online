<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
        ];
    }

    public function getColumns(): int | string | array
    {
        return [
            'md' => [
                'stats' => 5,
                'default' => 2,
            ],
        ];
    }

    public function getView(): string
    {
        return 'filament.pages.dashboard';
    }

    

    // Komentari atau hapus metode ini karena nggak dipakai lagi
    // public function getViewData(): array
    // {
    //     $widgets = [
    //         'StatsOverview' => app(StatsOverview::class),
    //         'WeeklyAttendanceChart' => app(WeeklyAttendanceChart::class),
    //         'MonthlyAttendanceChart' => app(MonthlyAttendanceChart::class),
    //         'EmployeeStats' => app(EmployeeStats::class),
    //     ];
    //
    //     return ['widgets' => $widgets];
    // }
}
<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CustomDashboardWidget;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\WeeklyAttendanceChart;
use App\Filament\Widgets\MonthlyAttendanceChart;
use App\Filament\Widgets\EmployeeStats;
use App\Filament\Widgets\LocationStats;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            // CustomDashboardWidget::class
            StatsOverview::class,
            // WeeklyAttendanceChart::class,
            // MonthlyAttendanceChart::class,
            // EmployeeStats::class,
            // LocationStats::class,
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
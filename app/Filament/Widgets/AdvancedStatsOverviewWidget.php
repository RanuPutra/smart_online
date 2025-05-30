<?php

namespace App\Filament\Widgets;

use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;
use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\Employee;
use App\Models\lokasi;

class AdvancedStatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {

        $today = Carbon::today();
        $totalemployee = Employee::count();
        $totallocation = Lokasi::count();
        $presenttoday = Absensi::whereDate('created_at', $today)->count();
        $absenttoday = $totalemployee - $presenttoday;

        return [
            Stat::make('Total Present', $presenttoday)
                ->icon('heroicon-o-face-smile')
                ->iconPosition('end')
                ->iconColor('success')
                ->iconBackgroundColor('success')
                ->chartColor('success')
                ->progress($totalemployee ? ($presenttoday / $totalemployee * 100) : 0)
                ->progressBarColor('success')
                ->description('% of employee present today')
                ->descriptionIcon('heroicon-o-chevron-up', 'before')
                ->descriptionColor('success'),
                // ->backgroundColor('info'),


            Stat::make('Total Absent', $absenttoday)
                ->icon('heroicon-o-face-frown')
                // ->progress(69)
                ->progressBarColor('success')
                ->iconBackgroundColor('success')
                ->chartColor('success')
                ->iconPosition('end')
                ->description('The users in this period')
                ->descriptionIcon('heroicon-o-chevron-up', 'before')
                ->descriptionColor('success')
                ->iconColor('success'),

            Stat::make('Total Employee', $totalemployee)
                ->icon('heroicon-o-user-group')
                // ->progress(69)
                ->progressBarColor('success')
                ->iconBackgroundColor('warning')
                ->chartColor('success')
                ->iconPosition('end')
                ->description('The users in this period')
                ->descriptionIcon('heroicon-o-chevron-up', 'before')
                ->descriptionColor('warning')
                ->iconColor('warning'),

            Stat::make('Total Location', $totallocation)
                ->icon('heroicon-o-building-office')
                // ->progress(69)
                ->progressBarColor('success')
                ->iconBackgroundColor('primary')
                ->chartColor('success')
                ->iconPosition('end')
                ->description('The users in this period')
                ->descriptionIcon('heroicon-o-chevron-up', 'before')
                ->descriptionColor('primary')
                ->iconColor('primary'),
        ];
    }
}
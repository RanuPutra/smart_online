<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\AdvancedStatsOverviewWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;


class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            AdvancedStatsOverviewWidget::class,
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

}
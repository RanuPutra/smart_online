<?php

namespace App\Filament\Widgets;

use App\Models\Lokasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LocationStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Lokasi', Lokasi::count())
            // ->description('Total')
            //     ->icon('heroicon-o-map-pin')
        ];
    }

    public function getColumnSpan(): int
    {
        return 2; // Sesuaikan dengan lebar kanan
    }
}

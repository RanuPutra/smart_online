<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class MonthlyAttendanceChart extends ChartWidget
{
    protected static ?string $heading = 'Monthly Attendance';

    protected function getData(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $data = Absensi::selectRaw('DAY(clock_in) as day, COUNT(*) as total')
            ->whereBetween('clock_in', [$startOfMonth, $endOfMonth])
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day')
            ->toArray();

        $labels = range(1, $endOfMonth->day);
        $values = array_map(function ($day) use ($data) {
            return $data[$day] ?? 0;
        }, $labels);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Absensi',
                    'data' => $values,
                    'backgroundColor' => '#4B5EAA',
                    'borderColor' => '#4B5EAA',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    // Ubah dari protected ke public
    public function getColumnSpan(): int
    {
        return 1; // Span 1 kolom
    }
}
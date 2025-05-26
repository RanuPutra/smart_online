<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class WeeklyAttendanceChart extends ChartWidget
{
    protected static ?string $heading = 'Weekly Attendance';

    protected function getData(): array
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $data = Absensi::selectRaw('DAYNAME(clock_in) as day, COUNT(*) as total')
            ->whereBetween('clock_in', [$startOfWeek, $endOfWeek])
            ->groupBy('day')
            ->orderByRaw("FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->pluck('total', 'day')
            ->toArray();

        $labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $values = array_map(function ($day) use ($data) {
            return $data[$day] ?? 0;
        }, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);

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
        return 'bar';
    }

    // Ubah dari protected ke public
    public function getColumnSpan(): int
    {
        return 1; // Span 1 kolom
    }
}
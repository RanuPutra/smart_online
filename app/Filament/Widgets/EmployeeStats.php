<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeStats extends BaseWidget
{
    protected ?string $heading = 'Employee';

    protected function getStats(): array
    {
        $total = Employee::count();
        $lakiLaki = Employee::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Employee::where('jenis_kelamin', 'Perempuan')->count();

        return [
            Stat::make('Total', $total)
                ->color('secondary'),
            Stat::make('Laki - Laki', $lakiLaki),
            Stat::make('Perempuan', $perempuan),
        ];
    }

    // Ubah dari protected ke public
    public function getColumnSpan(): int
    {
        return 2; // Span 2 kolom
    }
}
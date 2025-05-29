<?php

namespace App\Filament\Exports;

use App\Models\Absensi;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class AbsensiExporter extends Exporter
{
    protected static ?string $model = Absensi::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('employee.nama'),
            ExportColumn::make('lokasi.nama_lokasi'),
            ExportColumn::make('clock_in'),
            ExportColumn::make('clock_out'),
            ExportColumn::make('overtime_hours'),
            ExportColumn::make('notes'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your absensi export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}

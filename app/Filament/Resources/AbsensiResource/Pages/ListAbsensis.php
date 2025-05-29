<?php

namespace App\Filament\Resources\AbsensiResource\Pages;

use App\Filament\Exports\AbsensiExporter;
use App\Filament\Resources\AbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Exports\Enums\ExportFormat;

class ListAbsensis extends ListRecords
{
    protected static string $resource = AbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make() 
                ->label('Tambah') 
                ->Icon('heroicon-o-plus'),
            Actions\ExportAction::make()
                ->label('Export')
                ->exporter(AbsensiExporter::class)
                ->formats([ ExportFormat:: Xlsx ])
        ];
    }
}

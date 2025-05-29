<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make() 
                ->label('Tambah') 
                ->Icon('heroicon-o-plus'),
            Actions\ImportAction::make('importEmployee')
                ->label('Import')
                ->importer(\App\Filament\Imports\EmployeeImporter::class),
        ];
    }
}

<?php

namespace App\Filament\Imports;

use App\Models\Employee;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class EmployeeImporter extends Importer
{
    protected static ?string $model = Employee::class;

public static function getColumns(): array
{
    return [
        ImportColumn::make('foto')
            ->requiredMapping()
            ->rules(['nullable', 'max:255']),
        ImportColumn::make('id_karyawan')
            ->label('ID')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('nama')
            ->label('Nama')
            ->requiredMapping()
            ->rules(['required', 'max:255']),

        ImportColumn::make('jabatan')
            ->label('jabatan')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('jabatan')
            ->label('jabatan') 
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('departemen')
            ->label('Departemen')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('email')
            ->label('Email')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('nomor_telepon')
            ->label('No. Telp')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('jenis_kelamin')
            ->label('Jenis Kelamin')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('tanggal_bergabung')
            ->label('Tanggal Bergabung')
            ->requiredMapping()
            ->rules(['required', 'max:255']),



    ];
}
    public function resolveRecord(): ?Employee
    {
        // return Employee::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Employee();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your employee import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

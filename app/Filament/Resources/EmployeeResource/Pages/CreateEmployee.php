<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

protected function afterCreate(): void
{
    Notification::make()
        ->title('Data berhasil ditambahkan')
        ->success()
        ->send();
}

}

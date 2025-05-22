<?php

namespace App\Filament\Resources\LokasiResource\Pages;

use App\Filament\Resources\LokasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLokasi extends CreateRecord
{
    protected static string $resource = LokasiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

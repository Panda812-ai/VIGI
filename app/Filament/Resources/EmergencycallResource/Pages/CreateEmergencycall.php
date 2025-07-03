<?php

namespace App\Filament\Resources\EmergencycallResource\Pages;

use App\Filament\Resources\EmergencycallResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmergencycall extends CreateRecord
{
    protected static string $resource = EmergencycallResource::class;

      protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }
}

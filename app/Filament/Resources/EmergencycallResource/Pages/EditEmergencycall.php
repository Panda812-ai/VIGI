<?php

namespace App\Filament\Resources\EmergencycallResource\Pages;

use App\Filament\Resources\EmergencycallResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmergencycall extends EditRecord
{
    protected static string $resource = EmergencycallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

      protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }
}

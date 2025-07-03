<?php

namespace App\Filament\Resources\EmergencycallResource\Pages;

use App\Filament\Resources\EmergencycallResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmergencycalls extends ListRecords
{
    protected static string $resource = EmergencycallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

      protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }
}

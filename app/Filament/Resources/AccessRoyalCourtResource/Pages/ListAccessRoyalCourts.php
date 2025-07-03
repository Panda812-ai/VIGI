<?php

namespace App\Filament\Resources\AccessRoyalCourtResource\Pages;

use App\Filament\Resources\AccessRoyalCourtResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccessRoyalCourts extends ListRecords
{
    protected static string $resource = AccessRoyalCourtResource::class;

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

<?php

namespace App\Filament\Resources\AccessRoyalCourtResource\Pages;

use App\Filament\Resources\AccessRoyalCourtResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAccessRoyalCourt extends CreateRecord
{
    protected static string $resource = AccessRoyalCourtResource::class;

       protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }
}

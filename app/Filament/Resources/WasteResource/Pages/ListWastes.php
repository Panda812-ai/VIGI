<?php

namespace App\Filament\Resources\WasteResource\Pages;

use Closure;
use App\Filament\Resources\WasteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWastes extends ListRecords
{
    protected static string $resource = WasteResource::class;

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

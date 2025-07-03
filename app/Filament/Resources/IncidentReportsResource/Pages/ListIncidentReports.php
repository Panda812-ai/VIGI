<?php

namespace App\Filament\Resources\IncidentReportsResource\Pages;

use App\Filament\Resources\IncidentReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncidentReports extends ListRecords
{
    protected static string $resource = IncidentReportsResource::class;

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

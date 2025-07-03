<?php

namespace App\Filament\Resources\IncidentReportsResource\Pages;

use App\Filament\Resources\IncidentReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncidentReports extends EditRecord
{
    protected static string $resource = IncidentReportsResource::class;

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

<?php

namespace App\Filament\Resources\ObservationReportsResource\Pages;

use App\Filament\Resources\ObservationReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditObservationReports extends EditRecord
{
    protected static string $resource = ObservationReportsResource::class;

        protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ObservationReportsResource\Pages;

use App\Filament\Resources\ObservationReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListObservationReports extends ListRecords
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
            Actions\CreateAction::make(),
        ];
    }
}

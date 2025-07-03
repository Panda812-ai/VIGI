<?php

namespace App\Filament\Resources\ObservationReportsResource\Pages;

use App\Filament\Resources\ObservationReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateObservationReports extends CreateRecord
{
    protected static string $resource = ObservationReportsResource::class;

        protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }
}

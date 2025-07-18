<?php

namespace App\Filament\Resources\CameraStatisticsResource\Pages;

use App\Filament\Resources\CameraStatisticsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCameraStatistics extends EditRecord
{
    protected static string $resource = CameraStatisticsResource::class;

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

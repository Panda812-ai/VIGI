<?php

namespace App\Filament\Resources\CameraStatisticsResource\Pages;

use App\Filament\Resources\CameraStatisticsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCameraStatistics extends CreateRecord
{
    protected static string $resource = CameraStatisticsResource::class;
    
       protected function getRedirectUrl(): string
    {
        return
        static::getResource()::getUrl('index');
    }

}

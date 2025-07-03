<?php

namespace App\Filament\Clusters\Settings\Resources\CameraResource\Pages;

use App\Filament\Clusters\Settings\Resources\CameraResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCameras extends ManageRecords
{
    protected static string $resource = CameraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

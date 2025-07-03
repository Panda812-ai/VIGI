<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Settings extends Cluster
{
    protected static ?string $navigationLabel = 'Settings';
    
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

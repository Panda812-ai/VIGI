<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;

enum CameraStatus: string implements HasLabel, HasColor, HasIcon
{
    case ONLINE = 'online';
    case OFFLINE = 'offline';
    case MAINTENANCE = 'maintenance';

    public function getLabel(): ?string
    {
        return ucfirst(strtolower($this->name));
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::ONLINE => 'success',
            self::OFFLINE => 'danger',
            self::MAINTENANCE => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ONLINE => 'heroicon-o-check-circle',
            self::OFFLINE => 'heroicon-o-x-circle',
            
            self::MAINTENANCE => 'heroicon-o-cog-6-tooth',
        };
    }
}

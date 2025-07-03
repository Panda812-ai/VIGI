<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;

enum Status: string implements HasLabel, HasColor, HasIcon
{

    case SOLVED = 'solved';
    case UNSOLVED = 'unsolved';


    public function getLabel(): ?string
    {
        return ucfirst(strtolower($this->name));
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::SOLVED => 'success',
            self::UNSOLVED => 'warning',

        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::SOLVED => 'heroicon-o-check-circle',
            self::UNSOLVED => 'heroicon-o-x-circle',

        };
    }
}

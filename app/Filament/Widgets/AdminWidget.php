<?php

namespace App\Filament\Widgets;

use App\Models\IncidentReport;
use App\Models\ObservationReports;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Waste;

class AdminWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Waste',Waste::count())
            ->description('Total waste Have added')
                ->icon('heroicon-o-arrow-path-rounded-square')
                ->chart([15,9,3,7,17])
                ->color('primary'),

            Stat::make('Observations',ObservationReports::count())
                ->description('Total observations have added')
                ->icon('heroicon-o-exclamation-circle')
                ->chart([2,6,3,7,9])
                ->color('success'),

            Stat::make('Incidents',IncidentReport::count())
                ->description('Total incidents have added')
                ->icon('heroicon-o-exclamation-triangle')
                ->chart([20,9,3,7,9])
                ->color('danger'),
        ];
    }
}

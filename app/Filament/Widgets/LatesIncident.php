<?php

namespace App\Filament\Widgets;

use App\Models\IncidentReport;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatesIncident extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                IncidentReport::query()
                    ->orderBy('created_at', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('cameraRelationship.name')
                    ->label('Location'),

                Tables\Columns\TextColumn::make('status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Reported At'),
            ])->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'solved' => 'Solved',
                        'unsolved' => 'Unsolved',

                    ]),

            ])->actions([
                 Tables\Actions\EditAction::make(),
                 
            ]);
    }
}

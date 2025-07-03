<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\ObservationReports;
use App\Filament\Resources\ObservationReportsResource;


class LatesObservation extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                ObservationReports::query()
                    ->orderBy('created_at', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('cameraRelationship.name')
                    ->label('Location'),


                Tables\Columns\TextColumn::make('status'),


                Tables\Columns\TextColumn::make('created_at'),

            ])
            ->filters([
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

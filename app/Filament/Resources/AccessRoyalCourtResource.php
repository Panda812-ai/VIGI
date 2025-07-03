<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccessRoyalCourtResource\Pages;
use App\Models\AccessRoyalCourt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class AccessRoyalCourtResource extends Resource
{
    protected static ?string $model = AccessRoyalCourt::class;

    protected static ?string $navigationGroup = 'Security';


    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?int $navigationSort = 6;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Access Royal Court')
                    ->schema([
                        Forms\Components\TextInput::make('VehiclePlate')
                            ->label('Vehicle Plate')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),

                        Forms\Components\TextInput::make('VehicleType')
                            ->label('Vehicle Type')
                            ->required()
                            ->maxLength(50),

                        Forms\Components\DateTimePicker::make('AccessDateTime')
                            ->label('Access Date & Time')
                            ->required(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(false)
            ->columns([
                Tables\Columns\TextColumn::make('VehiclePlate')
                    ->label('Vehicle Plate')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('VehicleType')
                    ->label('Vehicle Type')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('AccessDateTime')
                    ->label('Access Date & Time')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccessRoyalCourts::route('/'),
            'create' => Pages\CreateAccessRoyalCourt::route('/create'),
            'edit' => Pages\EditAccessRoyalCourt::route('/{record}/edit'),
        ];
    }
}

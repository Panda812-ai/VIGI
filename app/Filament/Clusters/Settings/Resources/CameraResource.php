<?php

namespace App\Filament\Clusters\Settings\Resources;

use App\Filament\Clusters\Settings;
use App\Filament\Clusters\Settings\Resources\CameraResource\Pages;
use App\Models\Camera;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class CameraResource extends Resource
{
    protected static ?string $model = Camera::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $cluster = Settings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\Select::make('category')
                    ->options([
                        'netavis' => 'Netavis',
                        'ivs' => 'IVS',
                   ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('category')
                    ->sortable()
                    ->searchable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCameras::route('/'),
        ];
    }
}

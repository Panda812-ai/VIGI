<?php

namespace App\Filament\Resources;

use App\Enum\CameraStatus;
use App\Filament\Resources\CameraStatisticsResource\Pages;
use App\Models\CameraStatistics;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;


class CameraStatisticsResource extends Resource
{
    protected static ?string $model = CameraStatistics::class;

    protected static ?string $navigationGroup = 'Security';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                section::make('Camera Statistics')
                    ->schema([
                        Forms\Components\Select::make('camera_relationship_id')
                            ->label('Camera No#')
                            ->searchable()
                            ->relationship('cameraRelationship', 'name')
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->required()
                            ->options(CameraStatus::class),

                        Forms\Components\TextInput::make('ticket_no')
                            ->label('Ticket No#')
                            ->placeholder('Enter Ticket No#')
                            ->maxLength(20),

                        Forms\Components\TextInput::make('notes')
                            ->placeholder('Enter any additional notes')
                            ->label('Notes')
                            ->columnSpanFull()
                            ->maxLength(500),

            ])
            ->columns(2)
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(false)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('cameraRelationship.name')
                    ->label('Camera #')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('cameraRelationship.category')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),

                 Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('ticket_no')
                    ->searchable()
                    ->sortable()
                    ->default('N/A'),

                tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('notes')
                    ->limit(20)
                    ->wrap()
                    ->default('N/A')
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListCameraStatistics::route('/'),
            'create' => Pages\CreateCameraStatistics::route('/create'),
            'edit' => Pages\EditCameraStatistics::route('/{record}/edit'),
        ];
    }
}

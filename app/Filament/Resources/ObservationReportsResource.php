<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObservationReportsResource\Pages;
use App\Models\ObservationReports;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use App\Enum\Status;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;



class ObservationReportsResource extends Resource
{
    protected static ?string $model = ObservationReports::class;

     protected static ?string $navigationGroup = 'Security';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                forms\Components\Section::make('Observation Report')
                    ->schema([
                      Select::make('camera_relationship_id')
                            ->label('Location')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('CameraRelationship', 'name'),

                        Select::make('Shift')
                            ->required()
                            ->options([
                                    'morning' => 'Morning',
                                    'evening' => 'Evening',
                                    'night' => 'Night',
                            ]),
                        select::make('casetype_relationship_id')
                            ->label('Type')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->relationship('CaseTypeRelationship', 'type'),

                         Select::make('status')
                            ->required()
                            ->options(Status::class),

                        TextInput::make('notes')
                            ->placeholder('Enter any additional notes')
                            ->nullable()
                            ->columnSpanFull()
                            ->maxLength(500),

                        MarkdownEditor::make('Description')
                            ->placeholder('Enter a detailed description of the observation')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                         FileUpload::make('images')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->previewable(true)
                            ->directory('observation_images')
                            ->columnSpanFull(),

                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(false)
            ->columns([
                Tables\Columns\TextColumn::make('cameraRelationship.name')
                    ->label('Location')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Shift')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('CaseTypeRelationship.Type')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Description')
                    ->limit(20)
                    ->html(),

                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->label('Created At'),
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
            'index' => Pages\ListObservationReports::route('/'),
            'create' => Pages\CreateObservationReports::route('/create'),
            'edit' => Pages\EditObservationReports::route('/{record}/edit'),
        ];
    }
}

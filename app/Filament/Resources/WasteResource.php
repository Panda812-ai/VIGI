<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WasteResource\Pages;
use App\Models\Waste;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Enum\Status;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;



class WasteResource extends Resource
{
    protected static ?string $model = Waste::class;

    protected static ?string $navigationGroup = 'Security';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Add Waste')
                    ->schema([
                        Select::make('camera_relationship_id')
                            ->label('Camera #')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('CameraRelationship', 'name'),

                        Select::make('status')
                            ->required()
                            ->options(status::class),

                        TextInput::make('notes')
                            ->placeholder('Enter any additional notes')
                            ->nullable()
                            ->maxLength(500),

                        MarkdownEditor::make('description')
                            ->placeholder('Enter a detailed description of the waste')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->previewable(true)
                            ->directory('waste_images')
                            ->columnSpanFull(),
                ])
                ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(false)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('cameraRelationship.name')
                    ->label('Camera #')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->limit(20)
                    ->html(),

               TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                 TextColumn::make('notes')
                    ->label('Notes'),

                ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->size(50),

                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->date()
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
            'index' => Pages\ListWastes::route('/'),
            'create' => Pages\CreateWaste::route('/create'),
            'edit' => Pages\EditWaste::route('/{record}/edit'),
        ];
    }
}

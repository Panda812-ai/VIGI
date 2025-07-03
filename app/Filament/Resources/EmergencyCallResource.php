<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmergencycallResource\Pages;
use App\Models\EmergencyCall;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Enum\Status;


class EmergencycallResource extends Resource
{
    protected static ?string $model = EmergencyCall::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';

    protected static ?string $navigationGroup = 'Security';

    protected static ?int $navigationSort = 4;





    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                section::make('Emergency Call Details')
                    ->schema([
                        TextInput::make('caller_name')
                            ->label('Caller Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('caller_phone')
                            ->label('Caller Phone')
                            ->tel()
                            ->required()
                            ->maxLength(15),


                         Forms\Components\DateTimePicker::make('date_time')
                        ->label('Date & Time')
                        ->required(),

                        TextInput::make('case')
                            ->required()
                            ->maxLength(50),

                         Select::make('status')
                            ->required()
                            ->options(Status::class),


                        textInput::make('action_taken')
                            ->label('Action Taken')
                            ->required()
                            ->maxLength(500),

                       section::make('Communication Lines')
                    ->schema([

                         Forms\Components\Checkbox::make('landline'),
                        Forms\Components\Checkbox::make('ptt')
                            ->label('PTT'),
                        Forms\Components\Checkbox::make('line_1'),
                        Forms\Components\Checkbox::make('line_2'),


                    ])->columns(4),

                        MarkdownEditor::make('description')
                            ->label('Description of Emergency')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(1000),



                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(false)
            ->columns([
                Tables\Columns\TextColumn::make('caller_name')
                    ->label('Caller Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('caller_phone')
                    ->label('Caller Phone')
                    ->searchable()
                    ->sortable(),


                Tables\Columns\TextColumn::make('case')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('date_time')
                    ->label('Date and Time of Call')
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
            'index' => Pages\ListEmergencycalls::route('/'),
            'create' => Pages\CreateEmergencycall::route('/create'),
            'edit' => Pages\EditEmergencycall::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncidentReportsResource\Pages;
use App\Models\IncidentReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use App\Enum\Status;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IncidentReportsResource extends Resource
{
    protected static ?string $model = IncidentReport::class;

    protected static ?string $navigationGroup = 'Security';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('ir_number')
                        ->label('IR Number#')
                        ->prefix('IR #')
                        ->default(DB::table('incident_reports')->max('ir_number') + 1)
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->hint("this IR number is generated automatically")
                        ->hintcolor('primary')
                        ->columnSpanFull(),
                ]),


                Section::make('Incident Information')->schema([
                    select::make('camera_relationship_id')
                        ->label('Location')
                        ->relationship('cameraRelationship', 'name')
                        ->preload()
                        ->searchable()
                        ->required(),

                    select::make('casetype_relationship_id')
                            ->label('incident Type')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->relationship('CaseTypeRelationship', 'type'),

                    Select::make('status')
                            ->required()
                            ->options(Status::class),


                    Forms\Components\DateTimePicker::make('incident_date_time')
                        ->label('Incident Date & Time')
                        ->required(),




                Section::make('injuries Details')->schema([
                    Forms\Components\TextInput::make('injuries')
                        ->label('Injuries')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('injuries_details')
                        ->label('Injuries Details')
                        ->nullable()
                        ->required()
                        ->maxLength(500),

                    Forms\Components\TextInput::make('property_damage')
                        ->label('Property Damage')
                        ->required()
                        ->maxLength(255),


                    Forms\Components\TextInput::make('damage_type')
                        ->label('Damage Type')
                        ->nullable()
                        ->required()
                        ->maxLength(255),
                        ])->columns(2),
                ])->columns(4),

                Section::make('Reporter')->schema([
                    Forms\Components\TextInput::make('reporter_name')
                        ->label('Reporter Name')
                        ->required()
                        ->maxLength(255),

                select::make('status_reporter')
                        ->label('Status Reporter')
                        ->options([
                            'Employee' => 'Employee',
                            'Visitor' => 'Visitor',
                            'Resident' => 'Resident',
                           # 'Owner' => 'Owner',
                        ])
                        ->required() ,

                    Forms\Components\TextInput::make('reporter_id_no')
                        ->label('Reporter ID No#')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('reporter_contact_no')
                        ->label('Reporter Contact No#')
                        ->required()
                        ->maxLength(9) ,

                    Forms\Components\TextInput::make('reporting_method')
                        ->label('Reporting Method')
                        ->required()
                        ->maxLength(255),
                ])->columns(5),

                Section::make('Involved Parties')->schema([
                    Forms\Components\TextInput::make('involved_name')
                        ->label('Involved Party Name')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('involved_id_no')
                        ->label('Involved Party ID No#')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('involved_contact_no')
                        ->label('Involved Party Contact No#')
                        ->required()
                        ->maxLength(15),
                    Forms\Components\TextInput::make('involved_relation')
                        ->label('Relation to the Incident')
                        ->required()
                        ->maxLength(255),
                ])->columns(4),

                Section::make('incident_details')->schema([
                    Forms\Components\MarkdownEditor::make('incident_details')
                        ->placeholder('Enter a detailed description of the incident')
                        ->label('Incident Details')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull(),

                    Forms\Components\MarkdownEditor::make('response_and_action_taken')
                        ->placeholder('Enter a detailed description of the response and action taken')
                        ->label('Response and Action Taken')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull(),

                    MarkdownEditor::make('recommendations')
                        ->placeholder('Enter any recommendations for future prevention')
                        ->label('Recommendations')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull(),

                    FileUpload::make('images')
                        ->label('Images')
                        ->required()
                        ->image()
                        ->multiple()
                        ->columnSpanFull(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(false)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('ir_number')
                    ->label('IR Number#')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cameraRelationship.name')
                    ->label('Location')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('CaseTypeRelationship.Type')
                    ->label('Incident Type')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->date()
                    ->sortable(),

            ])->filters([
                //
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
            'index' => Pages\ListIncidentReports::route('/'),
            'create' => Pages\CreateIncidentReports::route('/create'),
            'edit' => Pages\EditIncidentReports::route('/{record}/edit'),
        ];
    }
}

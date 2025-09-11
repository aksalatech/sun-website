<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GlobalSettingResource\Pages;
use App\Filament\Resources\GlobalSettingResource\RelationManagers;
use App\Models\GlobalSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Model;

class GlobalSettingResource extends Resource
{
    protected static ?string $model = GlobalSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Global Settings';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'General Settings';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->disabled(fn(string $operation): bool => $operation === 'edit'),

                                Forms\Components\Select::make('input_type')
                                    ->options([
                                        'text' => 'Text Input',
                                        'textarea' => 'Text Area',
                                        'richtext' => 'Rich Text Editor',
                                        'number' => 'Number',
                                        'uploader' => 'File Uploader',
                                    ])
                                    ->required()
                                    ->live(onBlur: true),

                                Forms\Components\Group::make()
                                    ->schema(function (Get $get) {
                                        return match ($get('input_type')) {
                                            'text' => [
                                                Forms\Components\TextInput::make('content')
                                                    ->afterStateHydrated(function ($component, $state, ?Model $record) {
                                                        if ($record) {
                                                            $component->state($record->content);
                                                        }
                                                    }),
                                            ],
                                            'textarea' => [
                                                Forms\Components\Textarea::make('content')
                                                    ->rows(4)
                                                    ->afterStateHydrated(function ($component, $state, ?Model $record) {
                                                        if ($record) {
                                                            $component->state($record->content);
                                                        }
                                                    }),
                                            ],
                                            'richtext' => [
                                                Forms\Components\RichEditor::make('content')
                                                    ->afterStateHydrated(function ($component, $state, ?Model $record) {
                                                        if ($record) {
                                                            $component->state($record->content);
                                                        }
                                                    }),
                                            ],
                                            'number' => [
                                                Forms\Components\TextInput::make('content')
                                                    ->numeric()
                                                    ->afterStateHydrated(function ($component, $state, ?Model $record) {
                                                        if ($record) {
                                                            $component->state($record->content);
                                                        }
                                                    }),
                                            ],
                                            'uploader' => [
                                                Forms\Components\FileUpload::make('content')
                                                    ->directory('settings')
                                                    ->preserveFilenames()
                                                    ->afterStateHydrated(function ($component, $state, ?Model $record) {
                                                        if ($record) {
                                                            $component->state($record->content);
                                                        }
                                                    }),
                                            ],
                                            default => [],
                                        };
                                    }),


                                Forms\Components\TextInput::make('group'),
                            ])
                            ->columns(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('input_type')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('group')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Tables\Filters\SelectFilter::make('input_type')
                //     ->options([
                //         'text' => 'Text Input',
                //         'textarea' => 'Text Area',
                //         'richtext' => 'Rich Text Editor',
                //         'number' => 'Number',
                //         'uploader' => 'File Uploader',
                //     ]),
                // Tables\Filters\SelectFilter::make('group')
                //     ->options([
                //         'site' => 'Site',
                //         'contact' => 'Contact',
                //     ]),
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
            'index' => Pages\ListGlobalSettings::route('/'),
            'create' => Pages\CreateGlobalSetting::route('/create'),
            'edit' => Pages\EditGlobalSetting::route('/{record}/edit'),
        ];
    }
}

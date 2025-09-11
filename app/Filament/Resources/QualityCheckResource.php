<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QualityCheckResource\Pages;
use App\Models\QualityCheck;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QualityCheckResource extends Resource
{
    protected static ?string $model = QualityCheck::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationLabel = 'Quality Checks';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('text')
                    ->label('Text')
                    ->toolbarButtons(['bold'])
                    ->required(),
                Forms\Components\FileUpload::make('icon')
                    ->image()
                    ->disk('public')
                    ->directory('quality/icons')
                    ->maxSize(10240),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->sortable(),
                Tables\Columns\ImageColumn::make('icon')->disk('public'),
                Tables\Columns\TextColumn::make('title')->limit(30)->searchable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->filters([
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
            'index' => Pages\ListQualityChecks::route('/'),
            'create' => Pages\CreateQualityCheck::route('/create'),
            'edit' => Pages\EditQualityCheck::route('/{record}/edit'),
        ];
    }
}



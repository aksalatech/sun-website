<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero Image')
                    ->description('Upload and manage the hero image')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->directory('image')
                            ->maxSize(5120) // 5MB
                            ->helperText('Recommended size: 1920x1080px. Max size: 5MB')
                            ->columnSpanFull(),
                    ]),

                Section::make('Hero Content')
                    ->description('Main content section of the hero')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(1),

                                TextInput::make('subtitle')
                                    ->maxLength(255)
                                    ->columnSpan(1),
                                Select::make('wording_position')
                                    ->label('Wording Position')
                                    ->options([
                                        'left' => 'Left Align',
                                        'center' => 'Center Align',
                                        'end' => 'Right Align',
                                    ])
                                    ->default('center')
                                    ->required(),
                            ]),

                        RichEditor::make('description')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'blockquote',
                                'orderedList',
                                'bulletList',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Button Settings')
                    ->description('Configure the call-to-action button')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('button_text')
                                    ->placeholder('Enter button text')
                                    ->maxLength(50),

                                TextInput::make('button_link')
                                    ->placeholder('Enter button URL')
                                    ->url(),
                            ]),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('subtitle'),
                ImageColumn::make('image'),
                TextColumn::make('button_text'),
                TextColumn::make('button_link'),
                TextColumn::make('order')->sortable(true),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Preview')
                ->url('/blog/' . $this->record->slug)
                ->openUrlInNewTab()
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('success'),
            Actions\DeleteAction::make(),
        ];
    }
}

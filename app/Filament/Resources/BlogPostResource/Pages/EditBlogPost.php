<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Extensions\BitflanEditRecord;
use App\Filament\Resources\BlogPostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogPost extends BitflanEditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = BlogPostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make('locale'),
            Actions\DeleteAction::make(),
        ];
    }
}

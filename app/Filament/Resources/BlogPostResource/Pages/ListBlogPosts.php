<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Extensions\BitflanListRecords;
use App\Filament\Resources\BlogPostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogPosts extends BitflanListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = BlogPostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make('locale'),
            Actions\CreateAction::make(),
        ];
    }
}

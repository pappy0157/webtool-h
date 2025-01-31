<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Extensions\StructuredRecords;
use App\Filament\Resources\PageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends StructuredRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return array_merge([
            Actions\LocaleSwitcher::make('locale')
        ], parent::getActions());
    }
}

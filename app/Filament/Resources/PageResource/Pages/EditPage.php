<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Extensions\BitflanEditRecord;
use App\Filament\Resources\PageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends BitflanEditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return array_merge([
            Actions\LocaleSwitcher::make('locale')
        ], parent::getActions());
    }
}

<?php

namespace App\Filament\Pages;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use App\Settings\ToolPageSettings;
use App\Settings\ToolSlugSettings;
use Filament\Forms\Components;
use Filament\Notifications\Notification;

class ManageToolPageSettings extends BitflanSettingsPage
{
    protected static ?int    $navigationSort  = 1;
    protected static ?string $navigationLabel = 'Tool Page Settings';
    protected static ?string $navigationIcon  = 'heroicon-o-adjustments';
    protected static ?string $navigationGroup = 'Administration';

    protected static string $settings = ToolPageSettings::class;

    protected $toSanitize = [];

    protected function getFormSchema(): array
    {
        return [
            Components\Toggle::make('showRelatedTools')->label('Show Related Tools on The Tool Page')
        ];
    }
}

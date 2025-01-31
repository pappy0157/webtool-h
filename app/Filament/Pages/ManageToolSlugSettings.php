<?php

namespace App\Filament\Pages;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use App\Settings\ToolSlugSettings;
use Filament\Forms\Components;
use Filament\Notifications\Notification;

class ManageToolSlugSettings extends BitflanSettingsPage
{
    protected static ?int    $navigationSort  = 1;
    protected static ?string $navigationLabel = 'Tool Slugs / Permalinks';
    protected static ?string $navigationIcon  = 'heroicon-o-link';
    protected static ?string $navigationGroup = 'Administration';

    protected static string $settings = ToolSlugSettings::class;

    protected $toSanitize = [];

    protected function getFormSchema(): array
    {
        $form = [];
        $categories = config('tools.categories');

        foreach($categories as $category) {
            foreach($category['tools'] as $key => $tool) {
                $form[] = Components\TextInput::make($key)->label($tool['admin']['title'])->required();
            }
        }

        return $form;
    }
}

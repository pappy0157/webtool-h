<?php

namespace App\Filament\Pages\Tools;

use App\Settings\Tools\LineBreakRemoverSettings;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use Filament\Forms\Components;

class ManageLineBreakRemoverSettings extends BitflanSettingsPage
{
    protected static ?string $title                 = 'Line Break Remover Settings';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon        = 'heroicon-o-cog';

    protected static string $settings = LineBreakRemoverSettings::class;

    protected function getFormSchema(): array
    {
        return [
            Components\View::make('filament.components.tool-title-help-component')->columnSpan(2),
            Components\Grid::make()->schema([
                Components\Toggle::make('enabled')->label('Enable this Tool')->columnSpan(2),
                Components\TextInput::make('title')->placeholder('Title of this Tool')->helperText('This appears as the title of this Tool. Also used as Search Engine Title')->required()->columnSpan(2),
                Components\Textarea::make('summary')->placeholder('Summary of this Tool')->helperText('This will appear below the tool title.')->rows(2)->required()->columnSpan(2),
                Components\RichEditor::make('description')->placeholder('The Description of this Tool.')->helperText('This appears on the tool page. It\'s recommended for SEO.')->required()->columnSpan(2),
            ]),

            Components\Card::make()->columnSpan(2)->schema([
                Components\Textarea::make('metaDescription')->placeholder('SEO Description')->helperText('This the SEO Description that will be used in Meta & Open-Graph Tags')->rows(2)->required()->columnSpan(2),
                Components\Textarea::make('metaKeywords')->placeholder('SEO Keywords')->helperText('This will be used in the Meta Keywords Field.')->rows(2)->columnSpan(2),
            ])
        ];
    }
}

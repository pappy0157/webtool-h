<?php

namespace App\Filament\Pages;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use App\Settings\AdSettings;
use Filament\Forms\Components;

class ManageAdSettings extends BitflanSettingsPage
{
    protected static ?int    $navigationSort  = 1;
    protected static ?string $navigationLabel = 'Ad Settings';
    protected static ?string $navigationIcon  = 'heroicon-o-desktop-computer';
    protected static ?string $navigationGroup = 'Administration';

    protected static string $settings = AdSettings::class;

    protected $toSanitize = [];

    protected function getFormSchema(): array
    {
        return [
            Components\Grid::make(3)->schema([
                Components\Card::make([
                    Components\Toggle::make('popAdStatus')->label('Enable Pop Ad')->helperText('This option enables or disables the pop ad.'),
                    Components\Select::make('popAdLocation')->label('Code Insert Location')->options(
                        [
                            'header' => 'Header',
                            'footer' => 'Footer'
                        ]
                    )->default('header')->helperText('This option inserts the pop ad code into the header.'),
                    Components\Textarea::make('popAdCode')->label('Pop Ad Code')->helperText('Pop Ad Code here. This will be inserted to the head of the website.')->rows(4),
                ])->columns(1)->columnSpan(1),
    
                Components\Card::make([
                    Components\Toggle::make('topBannerStatus')->label('Enable Top Banner Ad')->helperText('This option enables or disables this banner ad.'),
                    Components\Textarea::make('topBannerCode')->label('Top Banner Ad Code')->helperText('This code will be inserted to the Top Banner Ad location')->rows(4),
                ])->columns(1)->columnSpan(1),

                Components\Card::make([
                    Components\Toggle::make('middleBannerStatus')->label('Enable Middle Banner Ad')->helperText('This option enables or disables this banner ad.'),
                    Components\Textarea::make('middleBannerCode')->label('Middle Banner Ad Code')->helperText('This code will be inserted to the Middle Banner Ad location')->rows(4),
                ])->columns(1)->columnSpan(1),
    
                Components\Card::make([
                    Components\Toggle::make('bottomBannerStatus')->label('Enable Bottom Banner Ad')->helperText('This option enables or disables this banner ad.'),
                    Components\Textarea::make('bottomBannerCode')->label('Top Banner Ad Code')->helperText('This code will be inserted to the Top Banner Ad location')->rows(4),
                ])->columns(1)->columnSpan(1),
            ])
        ];
    }
}

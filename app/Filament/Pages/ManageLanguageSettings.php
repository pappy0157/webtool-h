<?php

namespace App\Filament\Pages;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use Filament\Forms\Components;
use Filament\Notifications\Notification;

class ManageLanguageSettings extends BitflanSettingsPage
{
    protected static ?int    $navigationSort  = 1;
    protected static ?string $navigationLabel = 'Language Settings';
    protected static ?string $navigationIcon  = 'heroicon-o-globe';
    protected static ?string $navigationGroup = 'Administration';

    protected static string $settings = LanguageSettings::class;

    protected $toSanitize = [
        'defaultLanguage',
        'languages.code',
        'languages.flag',
        'languages.label',
        'languages.direction'
    ];

    protected function afterSave() {
        $settings = app(self::$settings);

        if(!count($settings->languages)) {
            $settings->fill([
                'defaultLanguage' => 'en',
                'languages' => [
                    [
                        'code' => 'en',
                        'label' => 'English',
                        'direction' => 'ltr',
                        'flag' => 'GB'
                    ]
                ]
            ]);
            $settings->save();

            Notification::make()
                ->title('Added English as the Default Language.')
                ->success()
                ->send();

            $this->redirect(ManageLanguageSettings::getUrl());
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Components\View::make('filament.components.language-help-component')->columnSpan(2),
            Components\Grid::make(3)->schema([
                Components\Card::make([
                    Components\Toggle::make('translateTools')->label('Translate Tool Titles & Description')->helperText('This will make tools use titles and descriptions from language files instead of the admin settings.'),
                ])->columns(1)->columnSpan(3),

                Components\Card::make([
                    Components\Select::make('defaultLanguage')->options(function(LanguageSettings $settings) {
                        $options = [];

                        foreach($settings->languages as $language) {
                            $options[$language['code']] = $language['label'];
                        }

                        return $options;
                    }),
                    Components\Repeater::make('languages')->createItemButtonLabel('+ Add Language')->schema([
                        Components\Grid::make(3)->schema([
                            Components\TextInput::make('code')->label('Language Code')->placeholder('en')->required()->columnSpan(1),
                            Components\TextInput::make('flag')->label('Flag Code')->placeholder('GB')->required()->columnSpan(1),
                            Components\TextInput::make('label')->label('Language Label')->placeholder('English')->required()->columnSpan(1),
                            Components\Select::make('direction')->label('Direction')->options([
                                'ltr' => 'Left-to-Right',
                                'rtl' => 'Right-to-Left'
                            ])->required()->columnSpan(3)
                        ])
                    ])
                ])->columns(1)->columnSpan(3)
            ])
        ];
    }
}

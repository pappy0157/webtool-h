<?php

namespace App\Filament\Pages;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use App\Settings\GeneralSettings;
use Filament\Forms\Components;

class ManageGeneralSettings extends BitflanSettingsPage
{
    protected static ?string $navigationLabel = 'General Settings';
    protected static ?string $navigationIcon  = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Administration';

    protected static string $settings = GeneralSettings::class;

    protected $toSanitize = [
        'websiteTitle',
        'websiteDescription',
        'websiteKeywords',
        'footerAttribution',
        'gaId',
        'recaptchaSiteKey',
        'recaptchaSecretKey',

        'links.label',
        'links.url',
        'styles.url',
        'scripts.url'
    ];

    protected function getFormSchema(): array
    {
        return [
            Components\Card::make([
                Components\TextInput::make('websiteTitle')->placeholder('Title of your Website')->helperText('This is appended to the title of every page.')->required()->columnSpan(2),
                Components\Textarea::make('websiteDescription')->placeholder('The Meta Description of your Website.')->helperText('This may be used as the Meta-description of your home-page.')->required()->rows(4)->columnSpan(2),
                Components\Textarea::make('websiteKeywords')->placeholder('The Meta Keywords for this Website')->helperText('This will be used as the Keywords for this Website.')->required()->rows(4)->columnSpan(2),
                Components\Textarea::make('footerAttribution')->placeholder('The Footer Description of your Website.')->helperText('This will be shown in the footer of your website..')->required()->rows(2)->columnSpan(2),
                Components\FileUpload::make('logo')->image()->columnSpan(1),
                Components\FileUpload::make('footerLogo')->label('Contrasting Logo')->image()->columnSpan(1),
                Components\FileUpload::make('favicon')->image()->columnSpan(2),
                Components\FileUpload::make('ogImage')->label('OG Image')->image()->columnSpan(2),
                Components\Toggle::make('darkTheme')->columnSpan(2)->label('Enable the Theme selection on your Website.')->helperText('If this option is on, users will be able to switch between Light & Dark Theme.'),
                Components\Select::make('defaultTheme')->columnSpan(2)->label('Default Theme for Users.')->helperText('This will be the default theme for users on your website.')->default('light')->options([
                    'light' => 'Light Theme',
                    'dark'  => 'Dark Theme'
                ]),
            ])->columns(2),

            Components\Card::make([
                Components\Toggle::make('contactPage')->columnSpan(2)->label('Enable the Contact Section on your Website.'),
                Components\TextInput::make('contactTitle')->label('Contact Page Title')->required()->columnSpan(1),
                Components\TextInput::make('contactKeywords')->label('Contact Page Keywords')->required()->columnSpan(1),
                Components\Textarea::make('contactDescription')->label('Contact Page Description')->required()->columnSpan(2)->rows(3),
            ])->columnSpan(1),

            Components\Card::make([
                Components\Toggle::make('blogSection')->columnSpan(2)->label('Enable the Blog Section on your Website.'),
                Components\TextInput::make('blogTitle')->label('Blog Page Title')->required()->columnSpan(1),
                Components\TextInput::make('blogKeywords')->label('Blog Page Keywords')->required()->columnSpan(1),
                Components\Textarea::make('blogDescription')->label('Blog Page Description')->required()->columnSpan(2)->rows(3),
            ])->columnSpan(1),

            Components\Card::make([
                Components\Repeater::make('links')->createItemButtonLabel('+ Add Link')->helperText('Add static links to the Header / Footer of your website.')->schema([
                    Components\TextInput::make('label')->label('Label')->required(),
                    Components\TextInput::make('url')->label('URL')->required(),
                    Components\Select::make('location')->required()->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                        'both'   => 'Both'
                    ]),
                    Components\Toggle::make('newTab')->label('Open in New Tab')
                ])
            ]),

            Components\Card::make([
                Components\TextInput::make('gaId')->label('Google Analytics ID')->columnSpan(2),

                Components\Textarea::make('customStyles')->label('Custom CSS')->rows(4)->columnSpan(1),
                Components\Textarea::make('headerTags')->label('Custom Header Tags')->rows(4)->columnSpan(1),
                Components\Textarea::make('bodyTags')->label('Custom Body Tags')->rows(4)->columnSpan(2),

                Components\Repeater::make('styles')->createItemButtonLabel('+ Add Stylesheet')->label('Custom Stylesheets')->schema([
                    Components\TextInput::make('url')->label('URL')->required()
                ])->columnSpan(1),

                Components\Repeater::make('scripts')->createItemButtonLabel('+ Add Script')->label('Custom Scripts')->schema([
                    Components\TextInput::make('url')->label('URL')->required(),
                    Components\Select::make('location')->required()->options([
                        'header' => 'Header',
                        'footer' => 'Footer'
                    ])
                ])->columnSpan(1),
            ])->columns(2),

            Components\Card::make([
                Components\Toggle::make('recaptchaEnabled')->label('Enable Google ReCaptcha')->helperText('You must add your domain to the ReCaptcha V2 console.')->columnSpan(2),
                Components\TextInput::make('recaptchaSiteKey')->label('ReCaptcha v2 Site Key')->columnSpan(1),
                Components\TextInput::make('recaptchaSecretKey')->label('ReCaptcha v2 Secret Key')->columnSpan(1)
            ])->columns(2)
        ];
    }
}

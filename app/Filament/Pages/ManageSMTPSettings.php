<?php

namespace App\Filament\Pages;
use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\LanguageSettings;
use App\Settings\SMTPSettings;
use Filament\Forms\Components;

class ManageSMTPSettings extends BitflanSettingsPage
{
    protected static ?string $navigationGroup = 'Administration';
    protected static ?string $title           = 'SMTP / E-Mail Settings'; 
    protected static ?int    $sort            = 5;
    protected static ?string $navigationIcon  = 'heroicon-o-mail';

    protected static string $settings = SMTPSettings::class;

    protected $toSanitize = [];

    protected function getFormSchema(): array
    {
        return [
            Components\Toggle::make('enabled')->label('Enable SMTP')->columnSpan(2),
            Components\TextInput::make('host')->label('SMTP Host')->columnSpan(1),
            Components\TextInput::make('port')->label('SMTP Port')->columnSpan(1),
            Components\TextInput::make('username')->label('SMTP Username')->columnSpan(1),
            Components\TextInput::make('password')->label('SMTP Password')->columnSpan(1),
            Components\TextInput::make('encryption')->label('Encryption')->columnSpan(2),
            Components\TextInput::make('from')->label('E-Mail From Address')->columnSpan(1),
            Components\TextInput::make('name')->label('E-Mail From Name')->columnSpan(1),
        ];
    }
}

<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LanguageSettings extends Settings {
    public ?string $defaultLanguage;
    public ?array  $languages;

    public ?bool $translateTools;

    public static function group(): string {
        return 'language';
    }
}
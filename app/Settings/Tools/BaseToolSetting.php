<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class BaseToolSetting extends Settings {
    public ?bool   $enabled;
    public ?string $title;
    public ?string $summary;
    public ?string $description;
    public ?string $metaDescription;
    public ?string $metaKeywords;

    public static function group(): string {
        return 'tool-setting';
    }
}
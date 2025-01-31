<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class TextToSlugSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-text-to-slug';
    }
}
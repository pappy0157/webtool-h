<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class PunycodeToUnicodeSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-punycode-to-unicode';
    }
}
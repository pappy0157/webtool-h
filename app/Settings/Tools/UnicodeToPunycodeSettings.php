<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class UnicodeToPunycodeSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-unicode-to-punycode';
    }
}
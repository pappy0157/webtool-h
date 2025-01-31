<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class WEBPToPNGSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-webp-to-png';
    }
}
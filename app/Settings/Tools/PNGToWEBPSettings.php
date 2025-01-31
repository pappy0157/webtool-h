<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class PNGToWEBPSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-png-to-webp';
    }
}
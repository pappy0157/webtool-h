<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class JPGToWEBPSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-jpg-to-webp';
    }
}
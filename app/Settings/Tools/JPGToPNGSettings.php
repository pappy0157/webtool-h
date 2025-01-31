<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class JPGToPNGSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-jpg-to-png';
    }
}
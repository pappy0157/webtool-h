<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class PNGToJPGSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-png-to-jpg';
    }
}
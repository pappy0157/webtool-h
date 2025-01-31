<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class WEBPToJPGSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-webp-to-jpg';
    }
}
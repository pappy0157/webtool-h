<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class Base64ToTextSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-base64-to-text';
    }
}
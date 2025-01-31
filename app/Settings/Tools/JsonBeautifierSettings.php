<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class JsonBeautifierSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-json-beautifier';
    }
}
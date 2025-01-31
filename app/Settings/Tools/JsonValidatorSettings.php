<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class JsonValidatorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-json-validator';
    }
}
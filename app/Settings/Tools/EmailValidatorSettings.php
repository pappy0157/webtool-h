<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class EmailValidatorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-email-validator';
    }
}
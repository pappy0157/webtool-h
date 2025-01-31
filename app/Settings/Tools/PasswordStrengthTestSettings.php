<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class PasswordStrengthTestSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-password-strength-test';
    }
}
<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class PalindromeCheckerSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-palindrome-checker';
    }
}
<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class RedirectCheckerSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-redirect-checker';
    }
}
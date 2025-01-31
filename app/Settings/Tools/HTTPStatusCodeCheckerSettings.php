<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class HTTPStatusCodeCheckerSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-http-status-code-checker';
    }
}
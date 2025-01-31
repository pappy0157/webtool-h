<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class OpenPortCheckerSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-open-port-checker';
    }
}
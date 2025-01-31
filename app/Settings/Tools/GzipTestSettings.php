<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class GzipTestSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-gzip-test';
    }
}
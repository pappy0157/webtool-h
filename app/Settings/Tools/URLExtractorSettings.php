<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class URLExtractorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-url-extractor';
    }
}
<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class SourceCodeDownloaderSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-source-code-downloader';
    }
}
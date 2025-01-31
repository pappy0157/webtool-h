<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class YouTubeThumbnailDownloaderSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-youtube-thumbnail-downloader';
    }
}
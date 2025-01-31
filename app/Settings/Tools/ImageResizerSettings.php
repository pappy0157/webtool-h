<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class ImageResizerSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-image-resizer';
    }
}
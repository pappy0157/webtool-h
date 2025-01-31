<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class RandomTextLineSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-random-text-line';
    }
}
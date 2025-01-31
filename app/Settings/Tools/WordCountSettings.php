<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class WordCountSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-word-count';
    }
}
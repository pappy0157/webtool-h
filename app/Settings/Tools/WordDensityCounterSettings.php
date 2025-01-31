<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class WordDensityCounterSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-word-density-counter';
    }
}
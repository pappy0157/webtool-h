<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class RandomNumberGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-random-number-generator';
    }
}
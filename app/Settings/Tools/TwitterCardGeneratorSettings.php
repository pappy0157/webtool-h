<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class TwitterCardGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-twitter-card-generator';
    }
}
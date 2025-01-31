<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class FakeNameGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-fake-name-generator';
    }
}
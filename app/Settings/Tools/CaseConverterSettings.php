<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class CaseConverterSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-case-converter';
    }
}
<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class JsonToXmlSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-json-to-xml';
    }
}
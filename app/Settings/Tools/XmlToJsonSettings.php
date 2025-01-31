<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class XmlToJsonSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-xml-to-json';
    }
}
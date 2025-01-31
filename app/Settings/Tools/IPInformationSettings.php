<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class IPInformationSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-ip-information';
    }
}
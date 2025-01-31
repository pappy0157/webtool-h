<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class BcryptGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-bcrypt-generator';
    }
}
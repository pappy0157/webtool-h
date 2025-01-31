<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class SQLBeautifierSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-sql-beautifier';
    }
}
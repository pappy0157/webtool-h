<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class SmtpTestSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-smtp-test';
    }
}
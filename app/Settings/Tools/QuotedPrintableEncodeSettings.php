<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class QuotedPrintableEncodeSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-quoted-printable-encode';
    }
}
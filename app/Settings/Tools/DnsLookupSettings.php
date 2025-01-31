<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class DnsLookupSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-dns-lookup';
    }
}
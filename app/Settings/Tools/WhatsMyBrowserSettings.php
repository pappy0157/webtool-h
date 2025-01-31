<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class WhatsMyBrowserSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-whats-my-browser';
    }
}
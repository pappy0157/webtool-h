<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class HTACCESSRedirectGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-htaccess-redirect-generator';
    }
}
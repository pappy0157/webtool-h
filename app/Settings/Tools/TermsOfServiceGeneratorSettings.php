<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class TermsOfServiceGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-terms-of-service-generator';
    }
}
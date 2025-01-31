<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class PrivacyPolicyGeneratorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-privacy-policy-generator';
    }
}
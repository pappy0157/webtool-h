<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class CreditCardValidatorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-credit-card-validator';
    }
}
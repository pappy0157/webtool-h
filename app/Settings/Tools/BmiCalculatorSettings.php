<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class BmiCalculatorSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-bmi-calculator';
    }
}
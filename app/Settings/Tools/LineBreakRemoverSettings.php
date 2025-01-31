<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class LineBreakRemoverSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-line-break-remover';
    }
}
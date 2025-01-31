<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ToolPageSettings extends Settings {
    public ?bool $showRelatedTools;

    public static function group(): string {
        return 'toolpage';
    }
}
<?php

namespace App\Settings\Tools;

use Spatie\LaravelSettings\Settings;

class MemoryStorageConverterSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-memory-storage-converter';
    }
}
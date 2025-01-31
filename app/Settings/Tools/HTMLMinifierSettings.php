<?php

namespace App\Settings\Tools;

class HTMLMinifierSettings extends BaseToolSetting {
    public static function group(): string {
        return 'tool-html-minifier';
    }
}
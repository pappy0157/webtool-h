<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTextToBase64ToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-text-to-base64.enabled', TRUE);
        $this->migrator->add('tool-text-to-base64.title', 'Text to Base64');
        $this->migrator->add('tool-text-to-base64.summary', 'Encode Text to Base64.');
        $this->migrator->add('tool-text-to-base64.description', 'Text to Base64 is a useful tool that allows you to convert text & encode them into base64 strings. Just specify the content and press the button to generate Base64 string.');
    
        $this->migrator->add('tool-slugs.TextToBase64', 'text-to-base64');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-text-to-base64.enabled');
        $this->migrator->delete('tool-text-to-base64.title');
        $this->migrator->delete('tool-text-to-base64.summary');
        $this->migrator->delete('tool-text-to-base64.description');

        $this->migrator->delete('tool-slugs.TextToBase64');
    }
}

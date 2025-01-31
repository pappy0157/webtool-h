<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddBase64ToTextToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-base64-to-text.enabled', TRUE);
        $this->migrator->add('tool-base64-to-text.title', 'Base64 To Text');
        $this->migrator->add('tool-base64-to-text.summary', 'Encode Base64 To Text.');
        $this->migrator->add('tool-base64-to-text.description', 'Base64 To Text is a useful tool that allows you to convert base64 into text strings. Just specify the content and press the button to generate Text string.');

        $this->migrator->add("tool-base64-to-text.metaDescription", "Base64 To Text is a useful tool that allows you to convert base64 into text strings. Just specify the content and press the button to generate Text string.");
        $this->migrator->add("tool-base64-to-text.metaKeywords", "");

        $this->migrator->add('tool-slugs.Base64ToText', 'base64-to-text');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-base64-to-text.enabled');
        $this->migrator->delete('tool-base64-to-text.title');
        $this->migrator->delete('tool-base64-to-text.summary');
        $this->migrator->delete('tool-base64-to-text.description');

        $this->migrator->delete('tool-slugs.Base64ToText');
    }
}

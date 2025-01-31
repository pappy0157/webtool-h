<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddImageToBase64ToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-image-to-base64.enabled', TRUE);
        $this->migrator->add('tool-image-to-base64.title', 'Image to Base64');
        $this->migrator->add('tool-image-to-base64.summary', 'Convert image to Base64 String.');
        $this->migrator->add('tool-image-to-base64.description', 'Image to Base64 is a useful tool that allows you to convert images to base64 strings. Just upload the image and press the button to generate Base64 string.');
    
        $this->migrator->add('tool-slugs.ImageToBase64', 'image-to-base64');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-image-to-base64.enabled');
        $this->migrator->delete('tool-image-to-base64.title');
        $this->migrator->delete('tool-image-to-base64.summary');
        $this->migrator->delete('tool-image-to-base64.description');

        $this->migrator->delete('tool-slugs.ImageToBase64');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddImageResizerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-image-resizer.enabled', TRUE);
        $this->migrator->add('tool-image-resizer.title', 'Image Resizer');
        $this->migrator->add('tool-image-resizer.summary', 'Resize any Image.');
        $this->migrator->add('tool-image-resizer.description', 'Image Resizer is a useful tool that helps you resize any image.');
    
        $this->migrator->add("tool-image-resizer.metaDescription", "Image Resizer is a useful tool that helps you resize any image.");
        $this->migrator->add("tool-image-resizer.metaKeywords", "");

        $this->migrator->add('tool-slugs.ImageResizer', 'image-resizer');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-image-resizer.enabled');
        $this->migrator->delete('tool-image-resizer.title');
        $this->migrator->delete('tool-image-resizer.summary');
        $this->migrator->delete('tool-image-resizer.description');

        $this->migrator->delete('tool-image-resizer.metaDescription');
        $this->migrator->delete('tool-image-resizer.metaKeywords');

        $this->migrator->delete('tool-slugs.ImageResizer');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddImageCompressorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-image-compressor.enabled', TRUE);
        $this->migrator->add('tool-image-compressor.title', 'Image Compressor');
        $this->migrator->add('tool-image-compressor.summary', 'Compress images easily online.');
        $this->migrator->add('tool-image-compressor.description', 'Image Compressor is a useful tool that helps you compress any image online.');
    
        $this->migrator->add("tool-image-compressor.metaDescription", "Image Compressor is a useful tool that helps you compress any image online.");
        $this->migrator->add("tool-image-compressor.metaKeywords", "");

        $this->migrator->add('tool-slugs.ImageCompressor', 'image-compressor');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-image-compressor.enabled');
        $this->migrator->delete('tool-image-compressor.title');
        $this->migrator->delete('tool-image-compressor.summary');
        $this->migrator->delete('tool-image-compressor.description');

        $this->migrator->delete('tool-image-compressor.metaDescription');
        $this->migrator->delete('tool-image-compressor.metaKeywords');

        $this->migrator->delete('tool-slugs.ImageCompressor');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWEBPToPNGToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-webp-to-png.enabled', TRUE);
        $this->migrator->add('tool-webp-to-png.title', 'WEBP to PNG');
        $this->migrator->add('tool-webp-to-png.summary', 'Convert WEBP to PNG easily online.');
        $this->migrator->add('tool-webp-to-png.description', 'WEBP to PNG is a useful tool that helps you convert WEBP Images to PNG.');
    
        $this->migrator->add("tool-webp-to-png.metaDescription", "WEBP to PNG is a useful tool that helps you convert WEBP Images to PNG.");
        $this->migrator->add("tool-webp-to-png.metaKeywords", "");

        $this->migrator->add('tool-slugs.WEBPToPNG', 'webp-to-png');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-webp-to-png.enabled');
        $this->migrator->delete('tool-webp-to-png.title');
        $this->migrator->delete('tool-webp-to-png.summary');
        $this->migrator->delete('tool-webp-to-png.description');

        $this->migrator->delete('tool-webp-to-png.metaDescription');
        $this->migrator->delete('tool-webp-to-png.metaKeywords');

        $this->migrator->delete('tool-slugs.WEBPToPNG');
    }
}

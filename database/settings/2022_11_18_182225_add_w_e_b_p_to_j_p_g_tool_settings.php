<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWEBPToJPGToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-webp-to-jpg.enabled', TRUE);
        $this->migrator->add('tool-webp-to-jpg.title', 'WEBP to JPG');
        $this->migrator->add('tool-webp-to-jpg.summary', 'Convert WEBP to JPG easily online.');
        $this->migrator->add('tool-webp-to-jpg.description', 'WEBP to JPG is a useful tool that helps you convert WEBP Images to JPG.');
    
        $this->migrator->add("tool-webp-to-jpg.metaDescription", "WEBP to JPG is a useful tool that helps you convert WEBP Images to JPG.");
        $this->migrator->add("tool-webp-to-jpg.metaKeywords", "");

        $this->migrator->add('tool-slugs.WEBPToJPG', 'webp-to-jpg');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-webp-to-jpg.enabled');
        $this->migrator->delete('tool-webp-to-jpg.title');
        $this->migrator->delete('tool-webp-to-jpg.summary');
        $this->migrator->delete('tool-webp-to-jpg.description');

        $this->migrator->delete('tool-webp-to-jpg.metaDescription');
        $this->migrator->delete('tool-webp-to-jpg.metaKeywords');

        $this->migrator->delete('tool-slugs.WEBPToJPG');
    }
}

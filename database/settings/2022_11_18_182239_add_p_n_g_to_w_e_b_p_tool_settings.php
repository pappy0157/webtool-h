<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPNGToWEBPToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-png-to-webp.enabled', TRUE);
        $this->migrator->add('tool-png-to-webp.title', 'PNG to WEBP');
        $this->migrator->add('tool-png-to-webp.summary', 'Convert PNG to WEBP easily online.');
        $this->migrator->add('tool-png-to-webp.description', 'PNG to WEBP is a useful tool that helps you convert PNG Images to WEBP.');
    
        $this->migrator->add("tool-png-to-webp.metaDescription", "PNG to WEBP is a useful tool that helps you convert PNG Images to WEBP.");
        $this->migrator->add("tool-png-to-webp.metaKeywords", "");

        $this->migrator->add('tool-slugs.PNGToWEBP', 'png-to-webp');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-png-to-webp.enabled');
        $this->migrator->delete('tool-png-to-webp.title');
        $this->migrator->delete('tool-png-to-webp.summary');
        $this->migrator->delete('tool-png-to-webp.description');

        $this->migrator->delete('tool-png-to-webp.metaDescription');
        $this->migrator->delete('tool-png-to-webp.metaKeywords');

        $this->migrator->delete('tool-slugs.PNGToWEBP');
    }
}

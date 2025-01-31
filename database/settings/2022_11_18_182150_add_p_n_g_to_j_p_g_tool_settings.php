<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddPNGToJPGToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-png-to-jpg.enabled', TRUE);
        $this->migrator->add('tool-png-to-jpg.title', 'PNG to JPG');
        $this->migrator->add('tool-png-to-jpg.summary', 'Convert PNG to JPG easily online.');
        $this->migrator->add('tool-png-to-jpg.description', 'PNG to JPG is a useful tool that helps you convert PNG Images to JPG.');
    
        $this->migrator->add("tool-png-to-jpg.metaDescription", "PNG to JPG is a useful tool that helps you convert PNG Images to JPG.");
        $this->migrator->add("tool-png-to-jpg.metaKeywords", "");

        $this->migrator->add('tool-slugs.PNGToJPG', 'png-to-jpg');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-png-to-jpg.enabled');
        $this->migrator->delete('tool-png-to-jpg.title');
        $this->migrator->delete('tool-png-to-jpg.summary');
        $this->migrator->delete('tool-png-to-jpg.description');

        $this->migrator->delete('tool-png-to-jpg.metaDescription');
        $this->migrator->delete('tool-png-to-jpg.metaKeywords');

        $this->migrator->delete('tool-slugs.PNGToJPG');
    }
}

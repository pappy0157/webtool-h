<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJPGToPNGToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-jpg-to-png.enabled', TRUE);
        $this->migrator->add('tool-jpg-to-png.title', 'JPG to PNG');
        $this->migrator->add('tool-jpg-to-png.summary', 'Convert JPG to PNG easily online.');
        $this->migrator->add('tool-jpg-to-png.description', 'JPG to PNG is a useful tool that helps you convert JPG Images to PNG.');
    
        $this->migrator->add("tool-jpg-to-png.metaDescription", "JPG to PNG is a useful tool that helps you convert JPG Images to PNG.");
        $this->migrator->add("tool-jpg-to-png.metaKeywords", "");

        $this->migrator->add('tool-slugs.JPGToPNG', 'jpg-to-png');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-jpg-to-png.enabled');
        $this->migrator->delete('tool-jpg-to-png.title');
        $this->migrator->delete('tool-jpg-to-png.summary');
        $this->migrator->delete('tool-jpg-to-png.description');

        $this->migrator->delete('tool-jpg-to-png.metaDescription');
        $this->migrator->delete('tool-jpg-to-png.metaKeywords');

        $this->migrator->delete('tool-slugs.JPGToPNG');
    }
}

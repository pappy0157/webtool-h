<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJPGToWEBPToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-jpg-to-webp.enabled', TRUE);
        $this->migrator->add('tool-jpg-to-webp.title', 'JPG to WEBP');
        $this->migrator->add('tool-jpg-to-webp.summary', 'Convert JPG to WEBP easily online.');
        $this->migrator->add('tool-jpg-to-webp.description', 'JPG to WEBP is a useful tool that helps you convert JPG Images to WEBP.');
    
        $this->migrator->add("tool-jpg-to-webp.metaDescription", "JPG to WEBP is a useful tool that helps you convert JPG Images to WEBP.");
        $this->migrator->add("tool-jpg-to-webp.metaKeywords", "");

        $this->migrator->add('tool-slugs.JPGToWEBP', 'jpg-to-webp');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-jpg-to-webp.enabled');
        $this->migrator->delete('tool-jpg-to-webp.title');
        $this->migrator->delete('tool-jpg-to-webp.summary');
        $this->migrator->delete('tool-jpg-to-webp.description');

        $this->migrator->delete('tool-jpg-to-webp.metaDescription');
        $this->migrator->delete('tool-jpg-to-webp.metaKeywords');

        $this->migrator->delete('tool-slugs.JPGToWEBP');
    }
}

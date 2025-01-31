<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddSHAGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-sha-generator.enabled', TRUE);
        $this->migrator->add('tool-sha-generator.title', 'SHA Generator');
        $this->migrator->add('tool-sha-generator.summary', 'Generate SHA hashes from text.');
        $this->migrator->add('tool-sha-generator.description', 'SHA Generator is a useful tool that allows you to generate / calculate SHA256 or SHA512 (SHA1, SHA2) hashes based on any string / text. Each hash generated will be unique but the same input will produce the same output.');
    
        $this->migrator->add('tool-slugs.SHAGenerator', 'sha-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-sha-generator.enabled');
        $this->migrator->delete('tool-sha-generator.title');
        $this->migrator->delete('tool-sha-generator.summary');
        $this->migrator->delete('tool-sha-generator.description');

        $this->migrator->delete('tool-slugs.SHAGenerator');
    }
}

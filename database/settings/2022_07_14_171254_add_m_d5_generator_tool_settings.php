<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddMD5GeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-md5-generator.enabled', TRUE);
        $this->migrator->add('tool-md5-generator.title', 'MD5 Generator');
        $this->migrator->add('tool-md5-generator.summary', 'Generate MD5 hashes from text.');
        $this->migrator->add('tool-md5-generator.description', 'MD5 Generator is a useful tool that allows you to generate / calculate MD5 hashes based on any string / text. Each hash generated will be unique but the same input will produce the same output.');
    
        $this->migrator->add('tool-slugs.MD5Generator', 'md5-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-md5-generator.enabled');
        $this->migrator->delete('tool-md5-generator.title');
        $this->migrator->delete('tool-md5-generator.summary');
        $this->migrator->delete('tool-md5-generator.description');

        $this->migrator->delete('tool-slugs.MD5Generator');
    }
}

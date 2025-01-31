<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHashGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-hash-generator.enabled', TRUE);
        $this->migrator->add('tool-hash-generator.title', 'Hash Generator');
        $this->migrator->add('tool-hash-generator.summary', 'Generate different types of hashes.');
        $this->migrator->add('tool-hash-generator.description', 'Password Generator allows you to generate hashes based on any data. The hashes generated by Hash Generator are calculated based on the algorithm you choose. These hashes are also secure as they are not sent over the internet and only exist on the client\'s machine.');
    
        $this->migrator->add('tool-slugs.HashGenerator', 'hash-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-hash-generator.enabled');
        $this->migrator->delete('tool-hash-generator.title');
        $this->migrator->delete('tool-hash-generator.summary');
        $this->migrator->delete('tool-hash-generator.description');

        $this->migrator->delete('tool-slugs.HashGenerator');
    }
}

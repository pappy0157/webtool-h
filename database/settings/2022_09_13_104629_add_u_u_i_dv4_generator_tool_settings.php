<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddUUIDv4GeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-uuidv4-generator.enabled', TRUE);
        $this->migrator->add('tool-uuidv4-generator.title', 'UUIDv4 Generator');
        $this->migrator->add('tool-uuidv4-generator.summary', 'Generate UUIDv4 IDs');
        $this->migrator->add('tool-uuidv4-generator.description', 'UUIDv4 Generator is a useful tool that helps you generate UUIDv4 IDs. UUIDv4 is a text based identification string that is sometimes used to identify users instead of Numberic IDs.');
    
        $this->migrator->add("tool-uuidv4-generator.metaDescription", "UUIDv4 Generator is a useful tool that helps you generate UUIDv4 IDs. UUIDv4 is a text based identification string that is sometimes used to identify users instead of Numberic IDs.");
        $this->migrator->add("tool-uuidv4-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.UUIDv4Generator', 'uuidv4-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-uuidv4-generator.enabled');
        $this->migrator->delete('tool-uuidv4-generator.title');
        $this->migrator->delete('tool-uuidv4-generator.summary');
        $this->migrator->delete('tool-uuidv4-generator.description');

        $this->migrator->delete('tool-uuidv4-generator.metaDescription');
        $this->migrator->delete('tool-uuidv4-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.UUIDv4Generator');
    }
}

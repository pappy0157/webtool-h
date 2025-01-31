<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddBcryptGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-bcrypt-generator.enabled', TRUE);
        $this->migrator->add('tool-bcrypt-generator.title', 'Bcrypt Generator');
        $this->migrator->add('tool-bcrypt-generator.summary', 'Generate Bcrypt Hashes');
        $this->migrator->add('tool-bcrypt-generator.description', 'BCrypt Generator is a useful tool that allows you to generate BCrypt hashes.');
    
        $this->migrator->add("tool-bcrypt-generator.metaDescription", "BCrypt Generator is a useful tool that allows you to generate BCrypt hashes.");
        $this->migrator->add("tool-bcrypt-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.BcryptGenerator', 'bcrypt-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-bcrypt-generator.enabled');
        $this->migrator->delete('tool-bcrypt-generator.title');
        $this->migrator->delete('tool-bcrypt-generator.summary');
        $this->migrator->delete('tool-bcrypt-generator.description');

        $this->migrator->delete('tool-bcrypt-generator.metaDescription');
        $this->migrator->delete('tool-bcrypt-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.BcryptGenerator');
    }
}

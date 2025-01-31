<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddFakeNameGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-fake-name-generator.enabled', TRUE);
        $this->migrator->add('tool-fake-name-generator.title', 'Fake Name Generator');
        $this->migrator->add('tool-fake-name-generator.summary', 'Generate Fake Identities.');
        $this->migrator->add('tool-fake-name-generator.description', 'Fake Name Generator is a useful tool that helps you generate fake identities.');
    
        $this->migrator->add("tool-fake-name-generator.metaDescription", "Fake Name Generator is a useful tool that helps you generate fake identities.");
        $this->migrator->add("tool-fake-name-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.FakeNameGenerator', 'fake-name-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-fake-name-generator.enabled');
        $this->migrator->delete('tool-fake-name-generator.title');
        $this->migrator->delete('tool-fake-name-generator.summary');
        $this->migrator->delete('tool-fake-name-generator.description');

        $this->migrator->delete('tool-fake-name-generator.metaDescription');
        $this->migrator->delete('tool-fake-name-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.FakeNameGenerator');
    }
}

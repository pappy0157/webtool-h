<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddLoremIpsumGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-lorem-ipsum-generator.enabled', TRUE);
        $this->migrator->add('tool-lorem-ipsum-generator.title', 'Lorem Ipsum Generator');
        $this->migrator->add('tool-lorem-ipsum-generator.summary', 'Generate placeholder lorem ipsum words & paragraphs.');
        $this->migrator->add('tool-lorem-ipsum-generator.description', 'Lorem Ipsum Generator is a tool that lets you generate placeholder text for your projects. You can choose how many words, sentences or paragraphs to be generated.');
    
        $this->migrator->add('tool-slugs.LoremIpsumGenerator', 'lorem-ipsum-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-lorem-ipsum-generator.enabled');
        $this->migrator->delete('tool-lorem-ipsum-generator.title');
        $this->migrator->delete('tool-lorem-ipsum-generator.summary');
        $this->migrator->delete('tool-lorem-ipsum-generator.description');

        $this->migrator->delete('tool-slugs.LoremIpsumGenerator');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTextSeparatorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-text-separator.enabled', TRUE);
        $this->migrator->add('tool-text-separator.title', 'Text Separator');
        $this->migrator->add('tool-text-separator.summary', 'Separate Text based on Characters.');
        $this->migrator->add('tool-text-separator.description', 'Text Separator is a useful tool that allows you to separate a piece of text based on any character of your choice. You may separate the text by periods, quotes or any other characters. Paste your Text and Click on the Separate Button.');
    
        $this->migrator->add('tool-slugs.TextSeparator', 'text-separator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-text-separator.enabled');
        $this->migrator->delete('tool-text-separator.title');
        $this->migrator->delete('tool-text-separator.summary');
        $this->migrator->delete('tool-text-separator.description');

        $this->migrator->delete('tool-slugs.TextSeparator');
    }
}

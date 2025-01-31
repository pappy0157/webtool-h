<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTextReverserToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-text-reverser.enabled', TRUE);
        $this->migrator->add('tool-text-reverser.title', 'Text Reverser');
        $this->migrator->add('tool-text-reverser.summary', 'Reverse any piece of text.');
        $this->migrator->add('tool-text-reverser.description', 'Text Reverser is a useful tool that helps you reverse any piece of text.');
    
        $this->migrator->add("tool-text-reverser.metaDescription", "Text Reverser is a useful tool that helps you reverse any piece of text.");
        $this->migrator->add("tool-text-reverser.metaKeywords", "");

        $this->migrator->add('tool-slugs.TextReverser', 'text-reverser');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-text-reverser.enabled');
        $this->migrator->delete('tool-text-reverser.title');
        $this->migrator->delete('tool-text-reverser.summary');
        $this->migrator->delete('tool-text-reverser.description');

        $this->migrator->delete('tool-text-reverser.metaDescription');
        $this->migrator->delete('tool-text-reverser.metaKeywords');

        $this->migrator->delete('tool-slugs.TextReverser');
    }
}

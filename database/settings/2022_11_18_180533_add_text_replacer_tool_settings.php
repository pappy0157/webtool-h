<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTextReplacerToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-text-replacer.enabled', TRUE);
        $this->migrator->add('tool-text-replacer.title', 'Text Replacer');
        $this->migrator->add('tool-text-replacer.summary', 'Replace any string occurences in text.');
        $this->migrator->add('tool-text-replacer.description', 'Text Replacer is a useful tool that helps you replace strings in a piece of text.');
    
        $this->migrator->add("tool-text-replacer.metaDescription", "Text Replacer is a useful tool that helps you replace strings in a piece of text.");
        $this->migrator->add("tool-text-replacer.metaKeywords", "");

        $this->migrator->add('tool-slugs.TextReplacer', 'text-replacer');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-text-replacer.enabled');
        $this->migrator->delete('tool-text-replacer.title');
        $this->migrator->delete('tool-text-replacer.summary');
        $this->migrator->delete('tool-text-replacer.description');

        $this->migrator->delete('tool-text-replacer.metaDescription');
        $this->migrator->delete('tool-text-replacer.metaKeywords');

        $this->migrator->delete('tool-slugs.TextReplacerTool');
    }
}

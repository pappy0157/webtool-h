<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWordDensityCounterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-word-density-counter.enabled', TRUE);
        $this->migrator->add('tool-word-density-counter.title', 'Word Density Counter');
        $this->migrator->add('tool-word-density-counter.summary', 'Find out the density of words in text.');
        $this->migrator->add('tool-word-density-counter.description', 'Word Density Counter is a useful tool that helps you find out the density of words in a piece of text.');
    
        $this->migrator->add("tool-word-density-counter.metaDescription", "Word Density Counter is a useful tool that helps you find out the density of words in a piece of text.");
        $this->migrator->add("tool-word-density-counter.metaKeywords", "");

        $this->migrator->add('tool-slugs.WordDensityCounter', 'word-density-counter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-word-density-counter.enabled');
        $this->migrator->delete('tool-word-density-counter.title');
        $this->migrator->delete('tool-word-density-counter.summary');
        $this->migrator->delete('tool-word-density-counter.description');

        $this->migrator->delete('tool-word-density-counter.metaDescription');
        $this->migrator->delete('tool-word-density-counter.metaKeywords');

        $this->migrator->delete('tool-slugs.WordDensityCounter');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddWordCountToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-word-count.enabled', TRUE);
        $this->migrator->add('tool-word-count.title', 'Word Count');
        $this->migrator->add('tool-word-count.summary', 'Count the Words & Letters in Text.');
        $this->migrator->add('tool-word-count.description', 'Word Count is a useful tool that helps you easily find the number of individual letters and words in a piece of text.');
    
        $this->migrator->add('tool-slugs.WordCount', 'word-count');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-word-count.enabled');
        $this->migrator->delete('tool-word-count.title');
        $this->migrator->delete('tool-word-count.summary');
        $this->migrator->delete('tool-word-count.description');

        $this->migrator->delete('tool-slugs.WordCount');
    }
}

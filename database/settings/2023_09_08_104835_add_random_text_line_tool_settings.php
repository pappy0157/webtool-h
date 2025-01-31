<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddRandomTextLineToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-random-text-line.enabled', TRUE);
        $this->migrator->add('tool-random-text-line.title', 'Randomize / Shuffle Text Lines');
        $this->migrator->add('tool-random-text-line.summary', 'This online tool randomizes / shuffle text lines provided as input. Get the random lines.');
        $this->migrator->add('tool-random-text-line.description', 'This online tool randomizes / shuffle text lines provided as input. Get the random lines.');

        $this->migrator->add("tool-random-text-line.metaDescription", "This online tool randomizes / shuffle text lines provided as input. Get the random lines.");
        $this->migrator->add("tool-random-text-line.metaKeywords", "");

        $this->migrator->add('tool-slugs.RandomTextLine', 'random-text-line');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-random-text-line.enabled');
        $this->migrator->delete('tool-random-text-line.title');
        $this->migrator->delete('tool-random-text-line.summary');
        $this->migrator->delete('tool-random-text-line.description');

        $this->migrator->delete('tool-random-text-line.metaDescription');
        $this->migrator->delete('tool-random-text-line.metaKeywords');

        $this->migrator->delete('tool-slugs.RandomTextLine');
    }
}

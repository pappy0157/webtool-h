<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddRandomNumberGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-random-number-generator.enabled', TRUE);
        $this->migrator->add('tool-random-number-generator.title', 'Random Number Generator');
        $this->migrator->add('tool-random-number-generator.summary', 'Generate numbers randomly with constraints.');
        $this->migrator->add('tool-random-number-generator.description', 'Random Number Generator is a useful tool that helps you generate random numbers.');
    
        $this->migrator->add("tool-random-number-generator.metaDescription", "Random Number Generator is a useful tool that helps you generate random numbers.");
        $this->migrator->add("tool-random-number-generator.metaKeywords", "");

        $this->migrator->add('tool-slugs.RandomNumberGenerator', 'random-number-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-random-number-generator.enabled');
        $this->migrator->delete('tool-random-number-generator.title');
        $this->migrator->delete('tool-random-number-generator.summary');
        $this->migrator->delete('tool-random-number-generator.description');

        $this->migrator->delete('tool-random-number-generator.metaDescription');
        $this->migrator->delete('tool-random-number-generator.metaKeywords');

        $this->migrator->delete('tool-slugs.RandomNumberGenerator');
    }
}

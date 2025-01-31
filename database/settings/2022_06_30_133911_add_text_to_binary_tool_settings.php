<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTextToBinaryToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-text-to-binary.enabled', TRUE);
        $this->migrator->add('tool-text-to-binary.title', 'Text to Binary');
        $this->migrator->add('tool-text-to-binary.summary', 'Convert / Encode text to Binary.');
        $this->migrator->add('tool-text-to-binary.description', 'Text to Binary is a useful tool that helps you easily encode text to binary. You can easily convert your text to binary for any purpose.');
    
        $this->migrator->add('tool-slugs.TextToBinary', 'text-to-binary');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-text-to-binary.enabled');
        $this->migrator->delete('tool-text-to-binary.title');
        $this->migrator->delete('tool-text-to-binary.summary');
        $this->migrator->delete('tool-text-to-binary.description');

        $this->migrator->delete('tool-slugs.TextToBinary');
    }
}

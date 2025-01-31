<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddBinaryToTextToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-binary-to-text.enabled', TRUE);
        $this->migrator->add('tool-binary-to-text.title', 'Binary to Text');
        $this->migrator->add('tool-binary-to-text.summary', 'Convert / Decode Binary to Text.');
        $this->migrator->add('tool-binary-to-text.description', 'Binary To Text is a useful tool that helps you decode binary to text. You can easily convert your binary to text for any purpose.');
    
        $this->migrator->add('tool-slugs.BinaryToText', 'binary-to-text');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-binary-to-text.enabled');
        $this->migrator->delete('tool-binary-to-text.title');
        $this->migrator->delete('tool-binary-to-text.summary');
        $this->migrator->delete('tool-binary-to-text.description');

        $this->migrator->delete('tool-slugs.BinaryToText');
    }
}

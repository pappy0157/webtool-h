<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddROT13EncoderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-rot13-encoder.enabled', TRUE);
        $this->migrator->add('tool-rot13-encoder.title', 'ROT13 Encoder');
        $this->migrator->add('tool-rot13-encoder.summary', 'Encode data into ROT13');
        $this->migrator->add('tool-rot13-encoder.description', 'ROT13 Encoder is a useful tool that helps you encode data into ROT13.');
    
        $this->migrator->add("tool-rot13-encoder.metaDescription", "ROT13 Encoder is a useful tool that helps you encode data into ROT13.");
        $this->migrator->add("tool-rot13-encoder.metaKeywords", "");

        $this->migrator->add('tool-slugs.ROT13Encoder', 'rot13-encoder');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-rot13-encoder.enabled');
        $this->migrator->delete('tool-rot13-encoder.title');
        $this->migrator->delete('tool-rot13-encoder.summary');
        $this->migrator->delete('tool-rot13-encoder.description');

        $this->migrator->delete('tool-rot13-encoder.metaDescription');
        $this->migrator->delete('tool-rot13-encoder.metaKeywords');

        $this->migrator->delete('tool-slugs.ROT13Encoder');
    }
}

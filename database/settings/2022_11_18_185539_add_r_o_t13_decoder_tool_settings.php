<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddROT13DecoderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-rot13-decoder.enabled', TRUE);
        $this->migrator->add('tool-rot13-decoder.title', 'ROT13 Decoder');
        $this->migrator->add('tool-rot13-decoder.summary', 'Decode ROT13 encoded data.');
        $this->migrator->add('tool-rot13-decoder.description', 'ROT13 Decoder is a useful tool that helps you decode ROT13 Data.');
    
        $this->migrator->add("tool-rot13-decoder.metaDescription", "ROT13 Decoder is a useful tool that helps you decode ROT13 Data.");
        $this->migrator->add("tool-rot13-decoder.metaKeywords", "");

        $this->migrator->add('tool-slugs.ROT13Decoder', 'rot13-decoder');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-rot13-decoder.enabled');
        $this->migrator->delete('tool-rot13-decoder.title');
        $this->migrator->delete('tool-rot13-decoder.summary');
        $this->migrator->delete('tool-rot13-decoder.description');

        $this->migrator->delete('tool-rot13-decoder.metaDescription');
        $this->migrator->delete('tool-rot13-decoder.metaKeywords');

        $this->migrator->delete('tool-slugs.ROT13Decoder');
    }
}

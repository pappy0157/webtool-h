<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddURLDecoderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-url-decoder.enabled', TRUE);
        $this->migrator->add('tool-url-decoder.title', 'URL Decoder');
        $this->migrator->add('tool-url-decoder.summary', 'Decode any URL that has been encoded.');
        $this->migrator->add('tool-url-decoder.description', 'URL Decoder is a useful tool that allows you to decode your URLs / Links. URL Encoding is a technique that makes links safe to be transmitted over the internet by using the ASCII character-set. URL Decoder allows you to revert encoded URLs to their original form.');
    
        $this->migrator->add('tool-slugs.URLDecoder', 'url-decoder');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-url-decoder.enabled');
        $this->migrator->delete('tool-url-decoder.title');
        $this->migrator->delete('tool-url-decoder.summary');
        $this->migrator->delete('tool-url-decoder.description');

        $this->migrator->delete('tool-slugs.URL Decoder');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddURLEncoderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-url-encoder.enabled', TRUE);
        $this->migrator->add('tool-url-encoder.title', 'URL Encoder');
        $this->migrator->add('tool-url-encoder.summary', 'Encode your URL to make them transmission-safe.');
        $this->migrator->add('tool-url-encoder.description', 'URL Encoder is a useful tool that allows you to encode your URLs / Links to make them safe for transmission over the internet. URLs can be transferred over the internet only in the ASCII character-set. URL Encoder makes sure your URL is safe for transmission.');
    
        $this->migrator->add('tool-slugs.URLEncoder', 'url-encoder');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-url-encoder.enabled');
        $this->migrator->delete('tool-url-encoder.title');
        $this->migrator->delete('tool-url-encoder.summary');
        $this->migrator->delete('tool-url-encoder.description');

        $this->migrator->delete('tool-slugs.URLEncoder');
    }
}
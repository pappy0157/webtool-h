<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTTPHeadersParserToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-http-headers-parser.enabled', TRUE);
        $this->migrator->add('tool-http-headers-parser.title', 'HTTP Headers Parser');
        $this->migrator->add('tool-http-headers-parser.summary', 'Parse HTTP Headers for any URL.');
        $this->migrator->add('tool-http-headers-parser.description', 'HTTP Headers Parser is a useful tool that allows you to view the HTTP Headers of any URL and Parse them. Type in any URL and click on the parse button to check the headers.');
    
        $this->migrator->add('tool-slugs.HTTPHeadersParser', 'http-headers-parser');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-http-headers-parser.enabled');
        $this->migrator->delete('tool-http-headers-parser.title');
        $this->migrator->delete('tool-http-headers-parser.summary');
        $this->migrator->delete('tool-http-headers-parser.description');

        $this->migrator->delete('tool-slugs.HTTPHeadersParser');
    }
}

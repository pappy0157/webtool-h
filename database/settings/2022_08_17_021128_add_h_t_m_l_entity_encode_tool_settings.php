<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTMLEntityEncodeToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-html-entity-encode.enabled', TRUE);
        $this->migrator->add('tool-html-entity-encode.title', 'HTML Entity Encode');
        $this->migrator->add('tool-html-entity-encode.summary', 'Encode HTML into HTML Entities.');
        $this->migrator->add('tool-html-entity-encode.description', 'HTML Entity Encoder is a useful tool that allows you to convert HTML Text to HTML entities. HTML Entities are safe to be sent over the internet and stored in a database. You should never send HTML over the internet unless its a trusted source. Paste in your HTML and Click on the Button to convert to HTML Entities.');
    
        $this->migrator->add('tool-slugs.HTMLEntityEncode', 'html-entity-encode');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-html-entity-encode.enabled');
        $this->migrator->delete('tool-html-entity-encode.title');
        $this->migrator->delete('tool-html-entity-encode.summary');
        $this->migrator->delete('tool-html-entity-encode.description');

        $this->migrator->delete('tool-slugs.HTMLEntityEncode');
    }
}

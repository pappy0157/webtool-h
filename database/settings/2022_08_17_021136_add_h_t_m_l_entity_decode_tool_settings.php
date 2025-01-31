<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTMLEntityDecodeToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-html-entity-decode.enabled', TRUE);
        $this->migrator->add('tool-html-entity-decode.title', 'HTML Entity Decode');
        $this->migrator->add('tool-html-entity-decode.summary', 'Decode HTML Entities into HTML.');
        $this->migrator->add('tool-html-entity-decode.description', 'HTML Entity Decoder is a useful tool that allows you to convert HTML Entities to HTML. HTML Entities are safe to be sent over the internet and stored in a database. You should never send HTML over the internet unless its a trusted source. Paste in your HTML Entities and Click on the Button to convert to HTML.');
    
        $this->migrator->add('tool-slugs.HTMLEntityDecode', 'html-entity-decode');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-html-entity-decode.enabled');
        $this->migrator->delete('tool-html-entity-decode.title');
        $this->migrator->delete('tool-html-entity-decode.summary');
        $this->migrator->delete('tool-html-entity-decode.description');

        $this->migrator->delete('tool-slugs.HTMLEntityDecode');
    }
}

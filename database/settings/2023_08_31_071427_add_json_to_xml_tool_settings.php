<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJsonToXmlToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-json-to-xml.enabled', TRUE);
        $this->migrator->add('tool-json-to-xml.title', 'JSON To Xml');
        $this->migrator->add('tool-json-to-xml.summary', 'It helps to convert your JSON data to XML format.');
        $this->migrator->add('tool-json-to-xml.description', 'It helps to convert your JSON data to XML format.');

        $this->migrator->add("tool-json-to-xml.metaDescription", "It helps to convert your JSON data to XML format.");
        $this->migrator->add("tool-json-to-xml.metaKeywords", "");

        $this->migrator->add('tool-slugs.JsonToXml', 'json-to-xml');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-json-to-xml.enabled');
        $this->migrator->delete('tool-json-to-xml.title');
        $this->migrator->delete('tool-json-to-xml.summary');
        $this->migrator->delete('tool-json-to-xml.description');

        $this->migrator->delete('tool-json-to-xml.metaDescription');
        $this->migrator->delete('tool-json-to-xml.metaKeywords');

        $this->migrator->delete('tool-slugs.JsonToXml');
    }
}

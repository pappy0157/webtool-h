<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddXmlToJsonToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-xml-to-json.enabled', TRUE);
        $this->migrator->add('tool-xml-to-json.title', 'XML To JSON');
        $this->migrator->add('tool-xml-to-json.summary', 'It helps to convert your XML data to JSON format.');
        $this->migrator->add('tool-xml-to-json.description', 'It helps to convert your XML data to JSON format.');

        $this->migrator->add("tool-xml-to-json.metaDescription", "It helps to convert your XML data to JSON format.");
        $this->migrator->add("tool-xml-to-json.metaKeywords", "");

        $this->migrator->add('tool-slugs.XmlToJson', 'xml-to-json');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-xml-to-json.enabled');
        $this->migrator->delete('tool-xml-to-json.title');
        $this->migrator->delete('tool-xml-to-json.summary');
        $this->migrator->delete('tool-xml-to-json.description');

        $this->migrator->delete('tool-xml-to-json.metaDescription');
        $this->migrator->delete('tool-xml-to-json.metaKeywords');

        $this->migrator->delete('tool-slugs.XmlToJson');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJsonBeautifierToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-json-beautifier.enabled', TRUE);
        $this->migrator->add('tool-json-beautifier.title', 'Json Beautifier');
        $this->migrator->add('tool-json-beautifier.summary', 'Online JSON Viewer, JSON Beautifier and Formatter to beautify and tree view of JSON data');
        $this->migrator->add('tool-json-beautifier.description', 'Online JSON Viewer, JSON Beautifier and Formatter to beautify and tree view of JSON data');

        $this->migrator->add("tool-json-beautifier.metaDescription", "Online JSON Viewer, JSON Beautifier and Formatter to beautify and tree view of JSON data");
        $this->migrator->add("tool-json-beautifier.metaKeywords", "");

        $this->migrator->add('tool-slugs.JsonBeautifier', 'json-beautifier');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-json-beautifier.enabled');
        $this->migrator->delete('tool-json-beautifier.title');
        $this->migrator->delete('tool-json-beautifier.summary');
        $this->migrator->delete('tool-json-beautifier.description');

        $this->migrator->delete('tool-json-beautifier.metaDescription');
        $this->migrator->delete('tool-json-beautifier.metaKeywords');

        $this->migrator->delete('tool-slugs.JsonBeautifier');
    }
}

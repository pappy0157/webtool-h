<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJsonValidatorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-json-validator.enabled', TRUE);
        $this->migrator->add('tool-json-validator.title', 'Json Validator');
        $this->migrator->add('tool-json-validator.summary', 'JSON Validator is the free online validator tool for JSON.');
        $this->migrator->add('tool-json-validator.description', 'JSON Validator is the free online validator tool for JSON.');

        $this->migrator->add("tool-json-validator.metaDescription", "JSON Validator is the free online validator tool for JSON.");
        $this->migrator->add("tool-json-validator.metaKeywords", "");

        $this->migrator->add('tool-slugs.JsonValidator', 'json-validator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-json-validator.enabled');
        $this->migrator->delete('tool-json-validator.title');
        $this->migrator->delete('tool-json-validator.summary');
        $this->migrator->delete('tool-json-validator.description');

        $this->migrator->delete('tool-json-validator.metaDescription');
        $this->migrator->delete('tool-json-validator.metaKeywords');

        $this->migrator->delete('tool-slugs.JsonValidator');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddCSVToJSONToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-csv-to-json.enabled', TRUE);
        $this->migrator->add('tool-csv-to-json.title', 'CSV To JSON');
        $this->migrator->add('tool-csv-to-json.summary', 'Convert CSV to JSON Format');
        $this->migrator->add('tool-csv-to-json.description', 'CSV To JSON is a converter that lets you convert your CSV Spreadsheets into the JSON Format. CSV is a lightweight format to represent spreadsheets whereas JSON is a text-based format most popular for sending data over the internet. Paste in your CSV and Click on the Button to convert to JSON.');
    
        $this->migrator->add('tool-slugs.CSVToJSON', 'csv-to-json');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-csv-to-json.enabled');
        $this->migrator->delete('tool-csv-to-json.title');
        $this->migrator->delete('tool-csv-to-json.summary');
        $this->migrator->delete('tool-csv-to-json.description');

        $this->migrator->delete('tool-slugs.CSVToJSON');
    }
}

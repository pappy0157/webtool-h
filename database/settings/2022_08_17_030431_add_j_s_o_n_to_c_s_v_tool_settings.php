<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJSONToCSVToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-json-to-csv.enabled', TRUE);
        $this->migrator->add('tool-json-to-csv.title', 'JSON To CSV');
        $this->migrator->add('tool-json-to-csv.summary', 'Convert JSON to CSV Format');
        $this->migrator->add('tool-json-to-csv.description', 'JSON To CSV is a converter that lets you convert your JSON into the CSV Format. CSV is a lightweight format to represent spreadsheets whereas JSON is a text-based format most popular for sending data over the internet. Paste in your JSON and Click on the Button to convert to CSV.');
    
        $this->migrator->add('tool-slugs.JSONToCSV', 'json-to-csv');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-json-to-csv.enabled');
        $this->migrator->delete('tool-json-to-csv.title');
        $this->migrator->delete('tool-json-to-csv.summary');
        $this->migrator->delete('tool-json-to-csv.description');

        $this->migrator->delete('tool-slugs.JSONToCSV');
    }
}

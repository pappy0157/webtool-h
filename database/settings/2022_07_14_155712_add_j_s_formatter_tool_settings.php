<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJSFormatterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-js-formatter.enabled', TRUE);
        $this->migrator->add('tool-js-formatter.title', 'JS Formatter');
        $this->migrator->add('tool-js-formatter.summary', 'Format JS code that is unformatted.');
        $this->migrator->add('tool-js-formatter.description', 'JS Formatter is a useful tool that allows you to format JS Code that is minified or unformatted. It will properly indent the code and add line breaks so that the code makes perfect sense.');
    
        $this->migrator->add('tool-slugs.JSFormatter', 'js-formatter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-js-formatter.enabled');
        $this->migrator->delete('tool-js-formatter.title');
        $this->migrator->delete('tool-js-formatter.summary');
        $this->migrator->delete('tool-js-formatter.description');

        $this->migrator->delete('tool-slugs.JSFormatter');
    }
}

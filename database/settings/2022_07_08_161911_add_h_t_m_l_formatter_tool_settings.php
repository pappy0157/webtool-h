<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTMLFormatterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-html-formatter.enabled', TRUE);
        $this->migrator->add('tool-html-formatter.title', 'HTML Formatter');
        $this->migrator->add('tool-html-formatter.summary', 'Format HTML code that is unformatted.');
        $this->migrator->add('tool-html-formatter.description', 'HTML Formatter is a useful tool that allows you to format HTML Code that is minified or unformatted. It will properly indent the code and add line breaks so that the code makes perfect sense.');
    
        $this->migrator->add('tool-slugs.HTMLFormatter', 'html-formatter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-html-formatter.enabled');
        $this->migrator->delete('tool-html-formatter.title');
        $this->migrator->delete('tool-html-formatter.summary');
        $this->migrator->delete('tool-html-formatter.description');

        $this->migrator->delete('tool-slugs.HTMLFormatter');
    }
}

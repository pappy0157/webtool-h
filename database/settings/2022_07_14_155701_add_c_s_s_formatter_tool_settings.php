<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddCSSFormatterToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-css-formatter.enabled', TRUE);
        $this->migrator->add('tool-css-formatter.title', 'CSS Formatter');
        $this->migrator->add('tool-css-formatter.summary', 'Format CSS code that is unformatted.');
        $this->migrator->add('tool-css-formatter.description', 'CSS Formatter is a useful tool that allows you to format CSS Code that is minified or unformatted. It will properly indent the code and add line breaks so that the code makes perfect sense.');
    
        $this->migrator->add('tool-slugs.CSSFormatter', 'css-formatter');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-css-formatter.enabled');
        $this->migrator->delete('tool-css-formatter.title');
        $this->migrator->delete('tool-css-formatter.summary');
        $this->migrator->delete('tool-css-formatter.description');

        $this->migrator->delete('tool-slugs.CSSFormatter');
    }
}

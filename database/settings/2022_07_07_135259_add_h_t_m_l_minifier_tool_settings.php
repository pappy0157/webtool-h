<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddHTMLMinifierToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-html-minifier.enabled', TRUE);
        $this->migrator->add('tool-html-minifier.title', 'HTML Minifier');
        $this->migrator->add('tool-html-minifier.summary', 'Minify your HTML Code for size reduction.');
        $this->migrator->add('tool-html-minifier.description', 'HTML Minifier is a useful tool that allows you to minify your HTML Code. Minified HTML Code has a smaller size and therefore it loads faster for the users. Minifying your code is recommended for a fast experience.');
    
        $this->migrator->add('tool-slugs.HTMLMinifier', 'html-minifier');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-html-minifier.enabled');
        $this->migrator->delete('tool-html-minifier.title');
        $this->migrator->delete('tool-html-minifier.summary');
        $this->migrator->delete('tool-html-minifier.description');

        $this->migrator->delete('tool-slugs.HTMLMinifier');
    }
}

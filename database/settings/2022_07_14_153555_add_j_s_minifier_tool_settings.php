<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJSMinifierToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-js-minifier.enabled', TRUE);
        $this->migrator->add('tool-js-minifier.title', 'JS Minifier');
        $this->migrator->add('tool-js-minifier.summary', 'Minify your JS code for size reduction.');
        $this->migrator->add('tool-js-minifier.description', 'JS Minifier is a useful tool that allows you to minify your JS Code. Minified JS Code has a smaller size and therefore it loads faster for the users. Minifying your code is recommended for a fast experience.');
    
        $this->migrator->add('tool-slugs.JSMinifier', 'js-minifier');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-js-minifier.enabled');
        $this->migrator->delete('tool-js-minifier.title');
        $this->migrator->delete('tool-js-minifier.summary');
        $this->migrator->delete('tool-js-minifier.description');

        $this->migrator->delete('tool-slugs.JSMinifier');
    }
}

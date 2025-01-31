<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddCSSMinifierToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-css-minifier.enabled', TRUE);
        $this->migrator->add('tool-css-minifier.title', 'CSS Minifier');
        $this->migrator->add('tool-css-minifier.summary', 'Minify your CSS code for size reduction.');
        $this->migrator->add('tool-css-minifier.description', 'CSS Minifier is a useful tool that allows you to minify your CSS Code. Minified CSS Code has a smaller size and therefore it loads faster for the users. Minifying your code is recommended for a fast experience.');
    
        $this->migrator->add('tool-slugs.CSSMinifier', 'css-minifier');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-css-minifier.enabled');
        $this->migrator->delete('tool-css-minifier.title');
        $this->migrator->delete('tool-css-minifier.summary');
        $this->migrator->delete('tool-css-minifier.description');

        $this->migrator->delete('tool-slugs.CSSMinifier');
    }
}

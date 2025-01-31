<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddJSObfuscatorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-js-obfuscator.enabled', TRUE);
        $this->migrator->add('tool-js-obfuscator.title', 'JS Obfuscator');
        $this->migrator->add('tool-js-obfuscator.summary', 'Protect your JavaScript code by obfuscating it.');
        $this->migrator->add('tool-js-obfuscator.description', 'JS Obfuscator is a useful tool that allows you to obfuscate your javascript code. Obfuscated code is very difficult to understand by an outsider and can make your code difficult to crack. Type in the code you want to obfuscate and press the button.');
    
        $this->migrator->add('tool-slugs.JSObfuscator', 'js-obfuscator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-js-obfuscator.enabled');
        $this->migrator->delete('tool-js-obfuscator.title');
        $this->migrator->delete('tool-js-obfuscator.summary');
        $this->migrator->delete('tool-js-obfuscator.description');

        $this->migrator->delete('tool-slugs.JSObfuscator');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateLanguageSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('language.translateTools', FALSE);
        $this->migrator->add('language.defaultLanguage', 'en');
        $this->migrator->add('language.languages', [
            [
                'code' => 'en',
                'label' => 'English',
                'flag' => 'GB',
                'direction' => 'ltr'
            ]
        ]);
    }

    public function down(): void {
        $this->migrator->delete('language.defaultLanguage');
        $this->migrator->delete('language.languages');
        $this->migrator->delete('language.translateTools');
    }
}

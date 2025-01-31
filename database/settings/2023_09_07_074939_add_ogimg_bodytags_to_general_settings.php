<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class addOgimgBodytagsToGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.ogImage', 'ogImage.webp');
        $this->migrator->add('general.bodyTags', '');
    }

    public function down() {
        $this->migrator->delete('general.ogImage');
        $this->migrator->delete('general.bodyTags');
    }
}

<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMiddleBannerSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('ads.middleBannerStatus', false);
        $this->migrator->add('ads.middleBannerCode', '');
    }
}

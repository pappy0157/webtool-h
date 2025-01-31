<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddAdSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('ads.popAdStatus', false);
        $this->migrator->add('ads.popAdCode', '');
        
        $this->migrator->add('ads.topBannerStatus', false);
        $this->migrator->add('ads.topBannerCode', '');

        $this->migrator->add('ads.bottomBannerStatus', false);
        $this->migrator->add('ads.bottomBannerCode', '');
    }
}

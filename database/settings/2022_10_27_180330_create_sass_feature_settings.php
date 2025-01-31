<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSassFeatureSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('sass.status', false);
        $this->migrator->add('sass.premiumPriceMonthly', 2.99);
        $this->migrator->add('sass.premiumPriceAnnually', 29.99);

        $this->migrator->add('sass.stripePublic', '');
        $this->migrator->add('sass.stripePrivate', '');

        $this->migrator->add('sass.googleClientId', '');
        $this->migrator->add('sass.googleClientSecret', '');

        $this->migrator->add('sass.premiumTools', []);
    }

    public function down(): void
    {
        $this->migrator->delete('sass.status');
        $this->migrator->delete('sass.premiumPriceMonthly');
        $this->migrator->delete('sass.premiumPriceAnnually');
        
        $this->migrator->delete('sass.stripePublic');
        $this->migrator->delete('sass.stripePrivate');

        $this->migrator->delete('sass.googleClientId');
        $this->migrator->delete('sass.googleClientSecret');

        $this->migrator->delete('sass.premiumTools');
    }
}

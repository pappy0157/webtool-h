<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddCaptchaSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.recaptchaEnabled', false);
        $this->migrator->add('general.recaptchaSiteKey', '');
        $this->migrator->add('general.recaptchaSecretKey', '');
    }

    public function down(): void {
        $this->migrator->delete('general.recaptchaEnabled');
        $this->migrator->delete('general.recaptchaSiteKey');
        $this->migrator->delete('general.recaptchaSecretKey');
    }
}

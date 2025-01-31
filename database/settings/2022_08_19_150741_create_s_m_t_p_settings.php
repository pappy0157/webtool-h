<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSMTPSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('smtp.enabled'   , FALSE);
        $this->migrator->add('smtp.host'      , '');
        $this->migrator->add('smtp.port'      , '');
        $this->migrator->add('smtp.username'  , '');
        $this->migrator->add('smtp.password'  , '');
        $this->migrator->add('smtp.encryption', 'tls');
        $this->migrator->add('smtp.from'      ,  'info@bitflan.com');
        $this->migrator->add('smtp.name'      , 'CyberTools');
    }

    public function down(): void {
        $this->migrator->delete('smtp.enabled');
        $this->migrator->delete('smtp.host');
        $this->migrator->delete('smtp.port');
        $this->migrator->delete('smtp.username');
        $this->migrator->delete('smtp.password');
        $this->migrator->delete('smtp.encryption');
        $this->migrator->delete('smtp.from');
        $this->migrator->delete('smtp.name');
    }
}

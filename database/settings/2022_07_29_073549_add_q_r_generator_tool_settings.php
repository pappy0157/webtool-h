<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddQRGeneratorToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-qr-generator.enabled', TRUE);
        $this->migrator->add('tool-qr-generator.title', 'QR Code Generator');
        $this->migrator->add('tool-qr-generator.summary', 'Create infinite QR Codes instantly.');
        $this->migrator->add('tool-qr-generator.description', 'QR Code Generator allows you to generate QR Codes based on any data. There is no limit to how many QR codes you can create. QR Codes are a very popular method of storing data in images that are easy to scan by phones / code scanners.');
    
        $this->migrator->add('tool-slugs.QRGenerator', 'qr-generator');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-qr-generator.enabled');
        $this->migrator->delete('tool-qr-generator.title');
        $this->migrator->delete('tool-qr-generator.summary');
        $this->migrator->delete('tool-qr-generator.description');

        $this->migrator->delete('tool-slugs.QRGenerator');
    }
}

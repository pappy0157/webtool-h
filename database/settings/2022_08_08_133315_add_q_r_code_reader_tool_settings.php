<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddQRCodeReaderToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-qr-code-reader.enabled', TRUE);
        $this->migrator->add('tool-qr-code-reader.title', 'QR Code Reader');
        $this->migrator->add('tool-qr-code-reader.summary', 'Read QR Codes from Image.');
        $this->migrator->add('tool-qr-code-reader.description', 'QR Code Reader allows you to read QR code data based on any image. Simply upload or specify the URL of the image to read the code.');
    
        $this->migrator->add('tool-slugs.QRCodeReader', 'qr-code-reader');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-qr-code-reader.enabled');
        $this->migrator->delete('tool-qr-code-reader.title');
        $this->migrator->delete('tool-qr-code-reader.summary');
        $this->migrator->delete('tool-qr-code-reader.description');

        $this->migrator->delete('tool-slugs.QRCodeReader');
    }
}

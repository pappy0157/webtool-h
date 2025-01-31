<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddDomainWhoisToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-domain-whois.enabled', TRUE);
        $this->migrator->add('tool-domain-whois.title', 'Domain WHOIS');
        $this->migrator->add('tool-domain-whois.summary', 'Get WHOIS Information about a domain name.');
        $this->migrator->add('tool-domain-whois.description', 'Domain WHOIS is a useful tool that allows you to find out the WHOIS information of .com, .net, .org, .info, .xyz, .biz domain names. Just type in the domain name and click the button to view the WHOIS information.');
    
        $this->migrator->add('tool-slugs.DomainWhois', 'domain-whois');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-domain-whois.enabled');
        $this->migrator->delete('tool-domain-whois.title');
        $this->migrator->delete('tool-domain-whois.summary');
        $this->migrator->delete('tool-domain-whois.description');

        $this->migrator->delete('tool-slugs.DomainWhois');
    }
}

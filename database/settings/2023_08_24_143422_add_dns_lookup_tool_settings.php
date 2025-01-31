<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddDnsLookupToolSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('tool-dns-lookup.enabled', TRUE);
        $this->migrator->add('tool-dns-lookup.title', 'Dns Lookup');
        $this->migrator->add('tool-dns-lookup.summary', 'Online dnslookup is a web based DNS client that queries DNS records for a given domain name.');
        $this->migrator->add('tool-dns-lookup.description', 'Domain Name Generator, Domains Generator, Instant Domain Generator, DomainsKit, Generate Domain Names');

        $this->migrator->add("tool-dns-lookup.metaDescription", "Domain Name Generator, Domains Generator, Instant Domain Generator, DomainsKit, Generate Domain Names");
        $this->migrator->add("tool-dns-lookup.metaKeywords", "");

        $this->migrator->add('tool-slugs.DnsLookup', 'dns-lookup');
    }

    public function down() : void
    {
        $this->migrator->delete('tool-dns-lookup.enabled');
        $this->migrator->delete('tool-dns-lookup.title');
        $this->migrator->delete('tool-dns-lookup.summary');
        $this->migrator->delete('tool-dns-lookup.description');

        $this->migrator->delete('tool-slugs.DnsLookup');
    }
}

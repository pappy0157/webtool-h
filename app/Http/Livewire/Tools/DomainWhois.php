<?php

namespace App\Http\Livewire\Tools;

use App\Settings\Tools\DomainGeneratorSettings;
use App\Settings\Tools\DomainWhoisSettings;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;


class DomainWhois extends Component
{
    public ?string $domain      = '';
    public ?string $whoisInfo   = '';
    public int $error           = 0;

    public array $servers = [];

    public function mount() {
        if(function_exists('fsockopen')) {
            $this->servers = [
                'com'  => 'whois.crsnic.net',
                'org'  => 'whois.pir.org',
                'net'  => 'whois.crsnic.net',
                'info' => 'whois.afilias.info',
                'app'  => 'whois.nic.google',
                'io'   => 'whois.nic.io',
                'xyz'  => 'whois.nic.xyz',
                'biz'  => 'whois.nic.biz'
            ];

            $settings = app(DomainWhoisSettings::class);
            if($settings->servers && count($settings->servers)) {
                foreach($settings->servers as $tld => $server) {
                    $this->servers[$tld] = $server;
                }
            }
        } else {
            $this->error = 4;
        }
    }

    public function getWhois() {
        if($this->error != 4) {
            $this->whoisinfo = '';
            $this->error   = 0;
    
            $domain = get_domain($this->domain);
            $tld    = get_tld($domain);

            if(isset($this->servers[trim($tld, '. ')])) {
                $data = $this->queryWhois(
                    $this->servers[trim($tld, '. ')],
                    $domain
                );
    
                $this->whoisInfo = $data;
            } else {
                $this->error = 2;
            }
        }
    }

    private function queryWhois($server, $domain) {
        $timeout = 5;
		$port    = 43;

		$afp = @fsockopen($server, $port, $errno, $errstr, $timeout);

		if(!$afp)
			return false;
		else {
			fputs($afp, $domain . "\r\n");
			$out = "";
			while(!feof($afp)){
				$out .= fgets($afp);
			}
			fclose($afp);
			return $out;
		}
    }

    public function render()
    {
        return view('modules.tools.domain-whois.livewire');
    }
}

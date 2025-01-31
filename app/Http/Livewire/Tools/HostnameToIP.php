<?php

namespace App\Http\Livewire\Tools;

use Illuminate\Support\Str;
use Livewire\Component;

class HostnameToIP extends Component
{
    public string $status   = 'none';
    public string $hostname = '';
    public string $ip       = '';

    public function getIP() {
        if($this->hostname) {
            if(Str::contains($this->hostname, '://', true)) {
                $this->hostname = explode('://', $this->hostname)[1];
            }

            $ip = gethostbyname(trim(strtolower($this->hostname)));

            if($ip) {
                $this->ip = $ip;
                $this->status = 'success';
                return;
            }
        }

        $this->status = 'error';
    }

    public function render()
    {
        return view('modules.tools.hostname-to-ip.livewire');
    }
}
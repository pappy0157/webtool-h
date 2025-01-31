<?php

namespace App\Http\Livewire\Tools;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class Ping extends Component
{
    public string $status  = 'none';
    public int    $code    = 0;
    public mixed  $latency = 0;
    public string $domain  = '';

    public function submit() {
        if(!Str::startsWith($this->domain, 'http'))
            $this->domain = 'https://' . $this->domain;

        if($this->domain) {
            $ch = curl_init($this->domain);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            if(curl_exec($ch)) {
                $info = curl_getinfo($ch);
                $this->latency = number_format(($info['total_time'] * 1000), 2);
                
                $this->status = 'OK';
            } else {
                $this->status = 'error';
            }
          
            curl_close($ch);
        }
    }

    public function render()
    {
        return view('modules.tools.ping.livewire');
    }
}
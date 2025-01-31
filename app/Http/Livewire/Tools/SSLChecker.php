<?php

namespace App\Http\Livewire\Tools;

use App\Extensions\CheckSSL;
use Livewire\Component;
use Illuminate\Support\Str;

class SSLChecker extends Component
{
    public string $status = 'none';
    public array  $result = [];
    public string $url    = '';

    public function submit() {
        if(!Str::startsWith($this->url, 'http'))
            $this->url = 'https://' . $this->url;

        $checkSSL = new CheckSSL();

        try {
            $data = $checkSSL->add($this->url)->check();

            $this->status = 'success';
            $this->result = $data;
            $this->result['success'] = $data['is_valid'];
            
        } catch(\Exception $e) {
            $this->status = 'failure';
        }
    }

    public function render() {
        return view('modules.tools.ssl-checker.livewire');
    }
}

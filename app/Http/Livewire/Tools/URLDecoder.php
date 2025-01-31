<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class URLDecoder extends Component
{
    public string $status = 'none';
    public string $result = '';
    public string $url    = '';

    public function submit() {
        if($this->url) {
            try {
                $this->result = urldecode($this->url);
                $this->status = 'success';
            } catch(\Exception $e) {
                $this->status = 'failure';
            }
        }
    }

    public function render() {
        return view('modules.tools.url-decoder.livewire');
    }
}

<?php

namespace App\Http\Livewire\Tools;

use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HTTPHeadersParser extends Component
{
    public int    $error   = 0;
    public string $url     = '';
    public array  $headers = [];

    public function submit() {
        if($this->url) {
            try {
                $response = Http::get($this->url);

                $this->headers = $response->headers();
            } catch(Exception $e) {
                $this->headers = [];
                $this->error   = 1;
            }
        } else
            $this->error = 1;
    }

    public function render()
    {
        return view('modules.tools.http-headers-parser.livewire');
    }
}
<?php

namespace App\Http\Livewire\Tools;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SourceCodeDownloader extends Component
{
    public string $status = 'none';
    public string $url    = '';
    public ?string $code   = '';

    public function generate() {
        try {
            $this->code = '';
            $this->status = 'none';

            if($this->url) {
                $response = Http::get($this->url);

                $this->code = iconv('ISO-8859-1', 'utf-8', $response->body());
            }
        } catch(\Exception $e) {
            $this->status = 'error';
        }
    }

    public function render()
    {
        return view('modules.tools.source-code-downloader.livewire');
    }
}
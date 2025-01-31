<?php

namespace App\Http\Livewire\Tools;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WebsiteStatusChecker extends Component
{
    public string $status = 'none';
    public int    $code   = 0;
    public string $domain = '';

    public function submit() {
        if($this->domain) {
            try {
                $response = Http::get($this->domain);

                $this->code = $response->status();
        
                $this->sendRedirect($response);
            } catch(\Exception $e) {
                $this->status = 'Unavailable';
                $this->code   = 0;
            }
        }
    }

    public function render()
    {
        return view('modules.tools.website-status-checker.livewire');
    }

    public function sendRedirect($response) {
        if($response->successful())
            $this->status = 'OK';
        else if($response->redirect())
            $this->status = 'Redirect';
        else if($response->clientError())
            $this->status = 'Client Error';
        else if($response->serverError())
            $this->status = 'Server Error';
        else
            $this->status = 'Unavailable';
    }
}
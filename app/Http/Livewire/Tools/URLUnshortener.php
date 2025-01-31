<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class URLUnshortener extends Component
{
    public string $status = 'none';
    public string $result = '';
    public string $url    = '';

    public function submit() {
        if($this->url) {
            try {
                $ch = curl_init($this->url);
                curl_setopt_array($ch, array(
                    CURLOPT_FOLLOWLOCATION => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_SSL_VERIFYHOST => FALSE,
                    CURLOPT_SSL_VERIFYPEER => FALSE, 
                ));
                curl_exec($ch);
                $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                curl_close($ch);

                if($effectiveUrl != $this->url) {
                    $this->result = $effectiveUrl;
                    $this->status = 'success';
                }
            } catch(\Exception $e) {
                $this->status = 'failure';
            }
        }
    }

    public function render() {
        return view('modules.tools.url-unshortener.livewire');
    }
}

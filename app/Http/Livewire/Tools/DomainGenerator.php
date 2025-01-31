<?php

namespace App\Http\Livewire\Tools;

use App\Settings\Tools\DomainGeneratorSettings;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class DomainGenerator extends Component
{
    public ?string $keyword     = '';
    public array $domains       = [];
    public string $affiliateUrl = '';
    public int $error           = 0;

    public function mount() {
        $settings = app(DomainGeneratorSettings::class);

        $this->affiliateUrl = $settings->affiliateUrl;
    }

    public function generate() {
        $this->domains = [];
        $this->error   = 0;

        $domains = [];

        if(!Str::contains($this->keyword, '.', TRUE)) {
            $requestUri = "https://sugapi.verisign-grs.com/ns-api/2.0/suggest?include-registered=false&tlds=com,net,org,biz,info,xyz&include-suggestion-type=true&sensitive-content-filter=true&use-numbers=true&max-length=32&lang=eng&max-results=50&name=" . trim(strtolower($this->keyword)) . "&use-idns=false";
        
            $response = Http::get($requestUri);

            if($response->successful()) {
                $data = $response->json();

                if(isset($data['results']) && count($data['results'])) {
                    foreach($data['results'] as $result) {
                        if($result['availability'] == 'available') {
                            $domains[] = [
                                'name' => $result['name'],
                                'link' => Str::replace('{name}', $result['name'], $this->affiliateUrl)
                            ];
                        }
                    }
                }

                if(count($domains)) {
                    $this->domains = $domains;
                } else {
                    $this->error = 3;
                }
            } else {
                $this->error = 2;
            }
        } else {
            $this->error = 1;
        }
    }

    public function render()
    {
        return view('modules.tools.domain-generator.livewire');
    }
}

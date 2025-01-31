<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class SHAGenerator extends Component
{
    public ?string $type    = '256';
    public ?string $content = '';
    public ?string $hash    = '';

    public function generate() {
        $this->hash = hash($this->type == '256' ? 'sha256' : 'sha512', $this->hash);
    }

    public function render()
    {
        return view('modules.tools.sha-generator.livewire');
    }
}

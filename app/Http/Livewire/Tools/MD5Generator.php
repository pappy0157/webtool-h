<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class MD5Generator extends Component
{
    public ?string $content = '';
    public ?string $hash    = '';

    public function generate() {
        $this->hash = hash('md5', $this->content);
    }

    public function render()
    {
        return view('modules.tools.md5-generator.livewire');
    }
}

<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class HashGenerator extends Component
{
    public ?string $type    = 'md2';
    public ?string $content = '';
    public ?string $hash    = '';

    public function generate() {
        $this->hash = hash($this->type, $this->hash);
    }

    public function render()
    {
        return view('modules.tools.hash-generator.livewire');
    }
}

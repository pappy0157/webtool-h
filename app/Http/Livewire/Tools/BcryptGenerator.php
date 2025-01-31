<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class BcryptGenerator extends Component
{
    public ?string $content = '';
    public ?string $hash    = '';

    public function generate() {
        $this->hash = bcrypt($this->content);
    }

    public function render()
    {
        return view('modules.tools.bcrypt-generator.livewire');
    }
}

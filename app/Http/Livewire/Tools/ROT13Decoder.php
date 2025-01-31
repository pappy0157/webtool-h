<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class ROT13Decoder extends Component
{
    public string $status    = 'none';
    public string $content   = '';
    public string $converted = '';

    public function generate() {
        try {
            $this->converted = str_rot($this->content, 13);
        } catch(\Exception $e) {
            $this->status = 'error';
        }
    }

    public function render()
    {
        return view('modules.tools.rot13-decoder.livewire');
    }
}
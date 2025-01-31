<?php

namespace App\Http\Livewire\Tools;

use Illuminate\Support\Str;
use Livewire\Component;

class UUIDv4Generator extends Component
{
    public string $uuidv4 = '';

    public function submit() {
        $this->uuidv4 = Str::uuid()->toString();
    }

    public function mount() {
        $this->uuidv4 = Str::uuid()->toString();
    }

    public function render()
    {
        return view('modules.tools.uuidv4-generator.livewire');
    }
}
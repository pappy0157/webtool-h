<?php

namespace App\Http\Livewire\Tools;

use Illuminate\Http\Request;
use Livewire\Component;

class UserAgentFinder extends Component
{
    public string $agent;

    public function mount(Request $request) {
        $this->agent = $request->header('User-Agent', null);
    }

    public function render()
    {
        return view('modules.tools.user-agent-finder.livewire');
    }
}

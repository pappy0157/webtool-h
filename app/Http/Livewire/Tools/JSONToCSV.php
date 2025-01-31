<?php

namespace App\Http\Livewire\Tools;

use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class JSONToCSV extends Component
{
    public string $status = 'none';
    public int    $code   = 0;
    public string $csv    = '';
    public string $json   = '';

    public function jsonToCSV($json) {
        try {
            $items = @json_decode($json, true);

            if(!$items) {
                $this->code = 1;
                return;
            }
    
            $csv = [];
    
            foreach($items as $i => $item) {
                if($i == 0) {
                    if(is_array($item)) {
                        $csv[] = join(',', array_keys($item));
                        $csv[] = join(',', array_values($item));
    
                        continue;
                    }
                }
                   
                $csv[] = join(',', array_values((array)$item));
            }
    
            return join("\n", $csv);
        } catch(Exception $e) {
            $this->code = 1;
            return '';
        }
    }

    public function submit() {
        $this->code = 0;
        $this->csv  = '';

        if($this->json) {
            try {
                $csv = $this->jsonToCSV($this->json);

                if($csv) {
                    $this->csv = $csv;
                } else {
                    $this->code = 1;
                }
            } catch(Exception $e) {
                throw $e;

                $this->code = 1;
            }
        }
    }

    public function render()
    {
        return view('modules.tools.json-to-csv.livewire');
    }
}
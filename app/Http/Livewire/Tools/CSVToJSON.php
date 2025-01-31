<?php

namespace App\Http\Livewire\Tools;

use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CSVToJSON extends Component
{
    public string $status = 'none';
    public int    $code   = 0;
    public string $csv    = '';
    public string $json   = '';
    public string $keys   = 'nokeys';

    public function csvToJson($csv) {
        try {
            $lines = explode("\n", $csv);
        
            $json = array();
    
            if($this->keys == 'keys') {
                $key = str_getcsv($lines[0],",");
    
                for($i = 1; $i < count($lines); $i++) {
                    $row = str_getcsv($lines[$i], ',');
                    $json[] = array_combine($key, $row);
                }
                
            } else {
                for($i = 0; $i < count($lines); $i++) {
                    $row = str_getcsv($lines[$i], ',');
                    $json[] = $row;
                }
            }
            
            return json_encode($json);
        } catch(Exception $e) {
            $this->code = 1;
        }
    }

    public function submit() {
        $this->code = 0;
        $this->json = '';

        if($this->csv) {
            try {
                $json = $this->csvToJson($this->csv);

                if($json) {
                    $this->json = $json;
                } else {
                    $this->code = 1;
                }
            } catch(Exception $e) {
                $this->code = 1;
            }
        }
    }

    public function render()
    {
        return view('modules.tools.csv-to-json.livewire');
    }
}
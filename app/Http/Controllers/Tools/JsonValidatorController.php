<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;

class JsonValidatorController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $error_msg = '';
        $error_success = false;
        $jsoncode = null;

        // Attempt to decode the JSON data
        $decodedData = json_decode(request()->jsonValidator);

        if(request()->input('submit')){
            // Check if JSON is valid
            $array = json_decode (request()->jsonValidator, true);
            if($array && is_array($array) && count($array)){
                if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
                    $error = true;
                    $error_msg = json_last_error_msg();
                } else {
                    $error_success = true;
                }
            }
            else{
                $error = true;
                $error_msg = json_last_error_msg();
            }
        }

        return view('modules.tools.json-validator.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'    => $tool,
            'toolSettings' => $settings,
            'toolSlugs'    => app(ToolSlugSettings::class),
            'related' => $related,

            'jsoncode'  => $jsoncode,
            'error_success'  => $error_success,
            'error_msg'  => $error_msg,
            'error' => $error
        ]);
    }
}

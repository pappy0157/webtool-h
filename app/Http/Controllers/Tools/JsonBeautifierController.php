<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;

class JsonBeautifierController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $jsoncode = null;

        if(request()->input('submit')){
            if(request()->jsonBeautifier){
                $array = json_decode (request()->jsonBeautifier, true);
                if($array && is_array($array) && count($array)){
                    $jsoncode = pretty_json(request()->jsonBeautifier);
                }
                else{
                    $error = true;
                }
            }
            else{
                $error = true;
            }
        }


        return view('modules.tools.json-beautifier.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'    => $tool,
            'toolSettings' => $settings,
            'toolSlugs'    => app(ToolSlugSettings::class),
            'related' => $related,

            'jsoncode'  => $jsoncode,
            'error' => $error
        ]);
    }
}

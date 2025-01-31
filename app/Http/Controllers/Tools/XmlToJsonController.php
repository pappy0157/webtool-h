<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;
use SimpleXMLElement;

class XmlToJsonController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $xml = null;
        $jtx = null;

        if(request()->input('submit')){
            if(request()->xml_to_json_data && isValidXml(request()->xml_to_json_data)){
                $xmlObject = simplexml_load_string(request()->xml_to_json_data);

                $jtx = json_encode($xmlObject, JSON_PRETTY_PRINT);
            }
            else{
                $error = true;
            }
        }


        return view('modules.tools.xml-to-json.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'    => $tool,
            'toolSettings' => $settings,
            'toolSlugs'    => app(ToolSlugSettings::class),
            'related' => $related,

            'jtx'  => $jtx,
            'error' => $error
        ]);
    }
}

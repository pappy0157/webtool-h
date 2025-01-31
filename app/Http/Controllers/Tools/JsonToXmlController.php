<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;
use SimpleXMLElement;

class JsonToXmlController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $xml = null;
        $jtx = null;

        if(request()->input('submit')){
            if(request()->json_to_xml_data){
                $array = json_decode (request()->json_to_xml_data, true);

                if(request()->json_to_xml_data) {
                    if($array && is_array($array) && count($array)){
                        $xml = new SimpleXMLElement('<root/>');
                        $jtx = arrayToXml($array, $xml);
                        $jtx = $xml->asXML();
                    }
                    else{
                        $error = true;
                    }
                }
            }
            else{
                $error = true;
            }
        }


        return view('modules.tools.json-to-xml.view', [
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

<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;

class QuotedPrintableEncodeController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $encoded_printable = null;

        if(request()->input('submit')){
            if(request()->input('encodeQuote')){
                $encoded_printable = quoted_printable_encode(request()->input('encodeQuote'));
            }
            else{
                $error = true;
            }
        }


        return view('modules.tools.quoted-printable-encode.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'    => $tool,
            'toolSettings' => $settings,
            'toolSlugs'    => app(ToolSlugSettings::class),
            'related' => $related,

            'encoded_printable'  => $encoded_printable,
            'error' => $error
        ]);
    }
}

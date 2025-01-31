<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;

class QuotedPrintableDecodeController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $decoded_printable = null;

        if(request()->input('submit')){
            if(request()->input('decodeQuote')){
                $decoded_printable = quoted_printable_decode(request()->input('decodeQuote'));
            }
            else{
                $error = true;
            }
        }


        return view('modules.tools.quoted-printable-decode.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'    => $tool,
            'toolSettings' => $settings,
            'toolSlugs'    => app(ToolSlugSettings::class),
            'related' => $related,

            'decoded_printable'  => $decoded_printable,
            'error' => $error
        ]);
    }
}

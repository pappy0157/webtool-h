<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;

class OpenPortCheckerController extends Base{

    public function index($tool, $settings, $related){
        $status = null;

        if(request()->input('submit')){
            $domain_name = get_domain(request()->port_link);
            $port_number = request()->port_number;

            $status = pingDomain($domain_name, $port_number);
        }

        return view('modules.tools.open-port-checker.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'    => $tool,
            'toolSettings' => $settings,
            'toolSlugs'    => app(ToolSlugSettings::class),
            'related' => $related,

            'status'  => $status
        ]);
    }
}

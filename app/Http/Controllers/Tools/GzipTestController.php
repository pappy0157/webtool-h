<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;
use Illuminate\Support\Facades\Http;

class GzipTestController extends Base{

    public function index($tool, $settings, $related){

        $error = false;
        $isGzipEnabled = null;
        $firstSize = null;
        $secondSize = null;
        $percentage = null;
        $contentType = null;

        $url = trim(request()->input('weburl'));

        if(request()->input('submit')){
            if ($url && is_valid_url($url)) {

                $response = Http::withHeaders([
                    'Accept-Encoding' => 'gzip, deflate'
                ])->get($url);
            
                $header = $response->header('x-encoded-content-encoding', null) ? $response->header('x-encoded-content-encoding', null) : $response->header('Content-Encoding', null);
            
                $isGzipEnabled = $header == 'gzip';

                $responseto = Http::get($url);

                $firstSize  = strlen($response->body());
                $secondSize = strlen(gzencode($responseto->body(), 9));

                $percentage = (($firstSize - $secondSize) / $firstSize) * 100;

                $contentType = $response->header('Content-Type');

            }
            else{
                $error = true;
            }
        }

        return view('modules.tools.gzip-test.view', [
            'title'                 => $settings->title,
            'description'           => $settings->metaDescription,
            'keywords'              => $settings->metaKeywords,
            'summary'               => $settings->summary,

            'tool'                  => $tool,
            'toolSettings'          => $settings,
            'toolSlugs'             => app(ToolSlugSettings::class),
            'related'               => $related,

            'isGzipEnabled'         => $isGzipEnabled,
            'originalSize'          => $firstSize,
            'gzipSize'              => $secondSize,
            'compressionPercentage' => $percentage,
            'contentType'           => $contentType,

            'error'                 => $error,
        ]);
    }
}

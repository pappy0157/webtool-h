<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Page;
use App\Models\ToolView;
use App\Settings\GeneralSettings;
use App\Settings\LanguageSettings;
use Illuminate\Http\Request;
use App\Settings\ToolSlugSettings;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MainController extends Base
{
    public function index(GeneralSettings $generalSettings) {
        return view('homepage', [
            'title'       => trans('webtools/pages.homepage'),
            'description' => $generalSettings->websiteDescription,
            'keywords'    => $generalSettings->websiteKeywords,
            'categories'  => config('tools.categories')
        ]);
    }

    public function page(Page $page) {
        return view('page', [
            'title'       => $page->title,
            'description' => $page->seoDescription,
            'keywords'    => $page->seoKeywords,
            'page'        => $page
        ]);
    }

    public function contact(GeneralSettings $generalSettings) {
        abort_if( ! $generalSettings->contactPage, 404, 'Not Found' );

        return view('contact', [
            'title'       => trans('webtools/pages.contact'),
            'description' => $generalSettings->contactDescription,
            'keywords'    => 'contact us, get in touch',
            'wire'        => true,
            'recaptcha'   => $generalSettings->recaptchaEnabled
        ]);
    }

    public function tool($slug, ToolSlugSettings $toolSlugs) {
        $categories = config('tools.categories');
        $tool       = null;
        $key        = null;

        // Resolve Tool from Slug
        foreach($toolSlugs->originalValues as $toolKey => $toolSlug)
            if( trim( strtolower( $slug ) ) == $toolSlug )
                $key = $toolKey;

        abort_if(!$key, 404, 'NOT FOUND');

        // Resolve Tool from Given Key
        $category = null;
        foreach($categories as $category) {
            if( isset($category[ 'tools' ][ $key ]) ) {
                $tool = $category[ 'tools' ][ $key ];
                break;
            }
        }

        abort_if($tool === null, 404, 'NOT FOUND');

        ToolView::addView($tool['name']);

        if( isset($tool['controller']) )
            return app($tool['controller'])->index($tool, app($tool['settings']), $category['tools']);
        else {
            $settings = app($tool['settings']);

            abort_if(!$settings->enabled, 404, 'NOT FOUND');
            abort_if(!can_use($key), 403, 'UNAUTHORIZED');

            $related = $category['tools'];

            return view('modules.tool-base', [
                'title'         => $settings->title,
                'description'   => $settings->metaDescription,
                'keywords'      => $settings->metaKeywords,
                'tool'          => $tool,
                'toolSettings'  => $settings,
                'toolSlugs'     => $toolSlugs,
                'related'       => $related,

                'scripts'       => isset( $tool['scripts'] ) ? $tool['scripts'] : null,
                'styles'        => isset( $tool['styles'] ) ? $tool['styles'] : null,

                'wireComponent' => isset( $tool['component'] ) ? $tool['component'] : null,
                'wire'          => isset( $tool['component'] ),
                'view'          => isset( $tool['view'] ) ? $tool['view'] : null,
            ]);
        }
    }

    public function language(LanguageSettings $languageSettings, $code) {
        foreach($languageSettings->languages as $language) {
            if(strtolower($code) == strtolower(trim($language['code']))) {
                Cookie::queue( Cookie::forever('lang', strtolower($code)) );
                return redirect('/');
            }
        }

        Cookie::queue( Cookie::forever('lang', 'en') );

        return redirect('/');
    }

    public function theme($theme) {
        if($theme == 'light' || $theme == 'dark') {
            Cookie::queue( Cookie::forever('theme', $theme) );
            return redirect('/');
        } else
            Cookie::queue( Cookie::forever('theme', 'light') );

        return redirect('/');
    }

    public function blog(GeneralSettings $settings) {
        if(!$settings->blogSection)
            return abort(404, 'Not Found');

        return view('blog', [
            'title'       => $settings->blogTitle,
            'description' => $settings->blogDescription,
            'keywords'    => $settings->blogKeywords,

            'posts'       => BlogPost::select('title', 'slug', 'summary', 'thumbnail', 'created_at')->paginate(9)
        ]);
    }

    public function blogPost(GeneralSettings $settings, BlogPost $post) {
        if(!$settings->blogSection)
            return abort(404, 'Not Found');

        return view('blog-post', [
            'title' => $post->title,
            'description' => $post->summary,
            'keywords'    => $post->keywords,

            'post' => $post
        ]);
    }

    public function downloadYoutubeThumb($id = null) {
        $file = file_get_contents('http://img.youtube.com/vi/' . $id . '/0.jpg');

        return response($file, 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="' . $id . '.jpg"'
        ]);
    }


    public function downloadQrCode($query = null) {
        $query = urldecode($query);
        $file  = file_get_contents('https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=' . $query);

        return response($file, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qr.png"'
        ]);
    }

    // public function checkBrowser(Request $request){
    //     $userAgent = $request->header('User-Agent');

    //     // Perform browser detection logic
    //     // You can use libraries like "jenssegers/agent" to parse the user agent string

    //     // Example using "jenssegers/agent" package:
    //     $agent = new \Jenssegers\Agent\Agent();
    //     $browser = $agent->browser();

    //     return view('modules.tools.whats-my-browser.view', compact('browser'));
    // }

}

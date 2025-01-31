<?php

namespace App\Http\Controllers;

use App\Bitflan;
use App\Models\Page;
use App\Settings\AdSettings;
use Illuminate\Support\Facades\View;
use App\Settings\GeneralSettings;
use App\Settings\LanguageSettings;
use App\Settings\SassFeatures;
use App\Settings\ToolSlugSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Base extends Controller {
    public function __construct(GeneralSettings $settings, AdSettings $adSettings, LanguageSettings $languageSettings, SassFeatures $sassSettings, ToolSlugSettings $toolSlugSettings, Request $request)
    {
        $toolSettings = DB::table('settings')->where('group', 'LIKE', 'tool-%')->whereIn('name', ['title', 'summary', 'enabled'])->get([ 'name', 'group', 'payload' ]);

        $toolSettings = $toolSettings->groupBy(function ($item) {
            return $item->group. '.' . $item->name;
        });

        View::share([
            'navigationPages'  => Page::query()->select([ 'title', 'slug', 'location' ])->orderBy('order')->get(),
            'generalSettings'  => $settings,
            'adSettings'       => $adSettings,
            'bitflanSettings'  => Bitflan::class,
            'languageSettings' => $languageSettings,
            'sass'             => $sassSettings,
            'locale'           => get_locale(),
            'theme'            => $settings->darkTheme ? $request->cookie('theme', $settings->defaultTheme) : $settings->defaultTheme,
            'slugs'            => $toolSlugSettings,
            'toolOptions'      => $toolSettings->toArray(),

            'cookieConsent'    => Cookie::get('cookie-consent', 'no-consent'),
            
        ]);
    }

    public function markCookieConsent() {
        Cookie::queue(
            Cookie::make('cookie-consent', 'consented', (60 * 24 * 365) * 100)
        );

        return response()->make([
            'message' => 'ok'
        ], 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}

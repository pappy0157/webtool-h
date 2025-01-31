<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Base;
use App\Settings\ToolSlugSettings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Settings\GeneralSettings;

class SmtpTestController extends Base{

    public function index($tool, $settings, $related){
        $sent = null;

        if(request()->input('submit')) {

            $fields = request()->validate([
                'host'       => 'required',
                'port'       => 'required',
                'username'   => 'required',
                'password'   => 'required',
                'from_email' => 'required|email',
                'to_email'   => 'required|email'
            ]);

            $config = [
                'driver' => 'smtp',
                'host'   => $fields['host'],
                'port'   => $fields['port'],
                'from'   => [
                    'address' => $fields['from_email'],
                    'name'    => config('app.name'),
                ],
                //'encryption' => 'tls',
                'username'   => $fields['username'],
                'password'   => $fields['password']
            ];

            Config::set('mail', $config);

            try {
                Mail::send('emails.smtp-tester-message', [
                    'logo' => storage_url(app(GeneralSettings::class)->logo)
                ], function($message) use($fields) {
                    $message->to($fields['to_email'], config('app.name'))
                    ->subject('SMTP Tester from ' . config('app.name'))
                    ->from($fields['from_email'], config('app.name'));
                });

                $sent = true;
            } catch(\Exception $e) {
                // throw $e;
                $sent = false;
            }
        }

        return view('modules.tools.smtp-test.view', [
            'title'         => $settings->title,
            'description'   => $settings->metaDescription,
            'keywords'      => $settings->metaKeywords,
            'summary'       => $settings->summary,

            'tool'          => $tool,
            'toolSettings'  => $settings,
            'toolSlugs'     => app(ToolSlugSettings::class),
            'related'       => $related,

            'sent'          => $sent
        ]);
    }
}

<?php

namespace App\Listeners;

use App\Bitflan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class LoginEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event) {
        if( $event->user->admin || $event->user->super_admin ) {
            if( File::exists( storage_path( 'bitflan/license.stp' ) ) ) {
                $key = File::get( storage_path( 'bitflan/license.stp' ) );

                $domain = request()->getHost();
                $domain = str_replace('www.', '', $domain);

                $response = Http::get( Bitflan::VendorAPI . 'verify_license/' . Bitflan::ID . '/' . $key . '/' . urlencode( $domain ) );

                $data = json_decode( $response->body(), true );

                if($data['code'] == 200) {
                    return;
                }
            }

            File::put( storage_path('bitflan/lock.stp'), 'true' );
            redirect(url('/'));
        }
    }
}

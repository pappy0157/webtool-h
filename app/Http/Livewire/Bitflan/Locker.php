<?php

namespace App\Http\Livewire\Bitflan;

use App\Bitflan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Locker extends Component
{
    public $licenseKey   = '';
    public $licenseError = false;

    public function submitLicense() {
        $domain = request()->getHost();
        $domain = str_replace('www.', '', $domain);

        $response = Http::get( Bitflan::VendorAPI . 'verify_license/' . Bitflan::ID . '/' . $this->licenseKey . '/' . urlencode( $domain ) );

        $data = json_decode( $response->body(), true );

        if($data['code'] == 200) {
            File::put( storage_path( 'bitflan/license.stp' ), $this->licenseKey );

            if( File::exists( storage_path( 'bitflan/lock.stp' ) ) )
                File::delete( storage_path( 'bitflan/lock.stp' ) );

            redirect(url('/'));
        } else {
            $this->licenseError = 'Please make sure you have attached your Domain to your License and your Code is Valid.';
        }
    }

    public function render()
    {
        return view('install.locker');
    }
}

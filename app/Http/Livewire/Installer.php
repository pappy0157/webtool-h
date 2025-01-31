<?php

namespace App\Http\Livewire;

use App\Bitflan;
use App\Models\User;
use Exception;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;
use GuzzleHttp\Client;

class Installer extends Component
{
    public $name, $version, $activate_link;

    /*
     * 0 = Requirements
     * 1 = License
     * 2 = Database
     * 3 = Admin Login
     */

    public $stage = 0;

    public $licenseKey   = '';
    public $licenseError = false;

    public $dbUsername   = '';
    public $dbPassword   = '';
    public $dbName       = '';
    public $dbPort       = '3306';
    public $dbHost       = 'localhost';
    public $dbError      = false;

    public $adminName                  = '';
    public $adminPassword              = '';
    public $adminPassword_confirmation = '';
    public $adminEmail                 = '';
    public $webUrl                     = '';

    public function requirements() {
        $extensions = get_loaded_extensions();

        /*
            [
                'LABEL',
                Function that returns true or false based on found or not.
                True or False if REQUIRED,
                True of False, Extension or Not.
            ]
        */
        return [
            [
                'Minimum PHP 8.x.',
                fn() => version_compare(phpversion(), '8.0.0') >= 0,
                true,
                false
            ],
            [
                'Storage & Public Directories writable.',
                fn() => File::isWritable(storage_path()) && File::isWritable(public_path()),
                true,
                false
            ],
            [
                'BCMath',
                fn() => in_array('bcmath', $extensions),
                true,
                true
            ],
            [
                'Ctype',
                fn() => in_array('ctype', $extensions),
                true,
                true
            ],
            [
                'Fileinfo',
                fn() => in_array('fileinfo', $extensions),
                true,
                true
            ],
            [
                'JSON',
                fn() => in_array('json', $extensions),
                true,
                true
            ],
            [
                'Mbstring',
                fn() => in_array('mbstring', $extensions),
                true,
                true
            ],
            [
                'OpenSSL',
                fn() => in_array('openssl', $extensions),
                true,
                true
            ],
            [
                'PDO MySQL',
                fn() => in_array('pdo_mysql', $extensions),
                true,
                true
            ],
            [
                'Tokenizer',
                fn() => in_array('tokenizer', $extensions),
                true,
                true
            ],
            [
                'XML',
                fn() => in_array('xml', $extensions),
                true,
                true
            ],
            [
                'cURL',
                fn() => in_array('curl', $extensions),
                true,
                true
            ],
            [
                'intl',
                fn() => in_array('intl', $extensions),
                true,
                true
            ],
            [
                'ZIP',
                fn() => in_array('zip', $extensions),
                false,
                true
            ]
        ];
    }

    private function confirmRequirements() {
        $return = true;

        foreach($this->requirements() as $requirement) {
            if($requirement[2] == true) {
                if($requirement[1]() != true) {
                    $return = false;
                }
            }
        }

        return $return;
    }

    public function submitRequirements() {
        if( $this->confirmRequirements() ) {
            File::put( storage_path('bitflan/requirements.stp'), 'true' );

            $this->stage = 1;
        }
    }

    public function submitLicense() {
        $domain = request()->getHost();
        $domain = str_replace('www.', '', $domain);

        $response = Http::get( Bitflan::VendorAPI . 'verify_license/' . Bitflan::ID . '/' . $this->licenseKey . '/' . urlencode( $domain ) );

        $data = json_decode( $response->body(), true );

        if($data['code'] == 200) {
            File::put( storage_path( 'bitflan/license.stp' ), $this->licenseKey );

            $this->stage = 2;
        } else {
            $this->licenseError = 'Please make sure you have attached your Domain to your License and your Code is Valid.';
        }
    }

    public function submitDb() {
        $this->validate([
            'dbUsername' => 'required',
            'dbName' => 'required',
            'dbPort' => 'required|numeric',
            'dbHost' => 'required'
        ]);

        try {
            $port = $this->dbPort && $this->dbPort != '3306' ? ':' . $this->dbPort : '';
            $db = new \pdo('mysql:host=' . $this->dbHost . $port . ';dbname=' . $this->dbName, $this->dbUsername, $this->dbPassword, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION) );

            $env = File::get( base_path( '.env' ) );

            $env = str_replace( [
                'DB_USERNAME=root',
                'DB_PASSWORD=db',
                'DB_DATABASE=filesflan',
                'DB_PORT=3306',
                'DB_HOST=127.0.0.1'
            ], [
                'DB_USERNAME=' . $this->dbUsername,
                'DB_PASSWORD=' . $this->dbPassword,
                'DB_DATABASE=' . $this->dbName,
                'DB_PORT=' . $this->dbPort,
                'DB_HOST=' . $this->dbHost
            ], $env );

            File::put( base_path( '.env' ), $env );

            return $this->redirect(route('installer'));
        } catch (\PDOException $e) {
            $this->dbError = 'No connection to the database with these details.';
        }
    }

    public function submitAdmin() {
        $this->validate([
            'adminName' => 'required',
            'adminEmail' => 'required|email',
            'adminPassword' => 'required|min:8|confirmed',
            'webUrl' => 'required|url'
        ]);

        $user = new User();

        $user->name  = $this->adminName;
        $user->email = $this->adminEmail;
        $user->email_verified_at = now(); 
        $user->password = bcrypt($this->adminPassword);
        $user->admin = true;
        $user->super_admin = true;
        $user->avatar = '';
        
        $user->save();

        File::put( storage_path( 'bitflan/admin.stp' ), 'true' );
        File::put( storage_path( 'bitflan/installed.stp' ), 'true' );

        $env = File::get( base_path( '.env' ) );

        $env = str_replace( ['APP_URL=http://localhost', 'APP_ENV=local'], ['APP_URL=' . trim($this->webUrl, ' \\/'), 'APP_ENV=production'], $env );

        File::put( base_path( '.env' ), $env );

        generate_new_sitemap();

        try {
            Artisan::call('storage:link');
        } catch(\Exception $e) {
            info('Symlinks Disabled.');
        }

        Filament::notify('success', 'Installation Successful!', true);

        redirect( route('filament.auth.login') );
    }

    public function mount() {
        $this->webUrl = url('/');

        if( Str::startsWith($this->webUrl, 'http') && !Str::startsWith($this->webUrl, 'https') ) {
            if(is_cloudflare_https()) {
                $this->webUrl = 'https' . substr($this->webUrl, 4);
            }
        }

        $this->name          = Bitflan::Name;
        $this->version       = Bitflan::Version;
        $this->activate_link = Bitflan::ActivateLink;

        $stage = 0;

        if(config('database.connections.mysql.database') !== 'filesflan') {
            Artisan::call('migrate --force --seed');
            File::put( storage_path( 'bitflan/database.stp' ), 'true' );
            $this->stage = 3;

            return;
        }

        if( File::exists( storage_path( 'bitflan/requirements.stp' ) ) )
            $stage = 1;

        if( File::exists( storage_path( 'bitflan/license.stp' ) ) )
            $stage = 2;

        if( File::exists( storage_path( 'bitflan/database.stp' ) ) )
            $stage = 3;

        if( File::exists( storage_path( 'bitflan/admin.stp' ) ) ) {
            File::put( storage_path( 'bitflan/installed.stp' ), 'true' );

            return redirect()->to('/');
        }

        $this->stage = $stage;
    }
    
    public function render()
    {
        return view('install.livewire');
    }
}

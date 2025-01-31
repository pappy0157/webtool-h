<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\Page;
use App\Models\User;
use App\Settings\GeneralSettings;
use App\Settings\LanguageSettings;
use App\Settings\SMTPSettings;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use RyanChandler\FilamentTools\Tools;
use RyanChandler\FilamentTools\Tool;
use RyanChandler\FilamentTools\ToolInput;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        if( ! is_localhost() && is_cloudflare_https() )
            URL::forceScheme('https');


        if( File::exists( storage_path('bitflan/installed.stp') ) ) {
            $default  = app(LanguageSettings::class)->defaultLanguage;
            $selected = Cookie::get('lang'); 

            if($selected && is_valid_locale($selected))
                App::setLocale($selected);
            else
                App::setLocale($default);

            $smtpSettings = app(SMTPSettings::class);
            $generalSettings = app(GeneralSettings::class);
    
            Config::set('app.name', $generalSettings->websiteTitle);
    
            if($smtpSettings->enabled) {
                $config = [
                    'driver' => 'smtp',
                    'host'   => $smtpSettings->host,
                    'port'   => $smtpSettings->port,
                    'from'   => [
                        'address' => $smtpSettings->from,
                        'name'    => $smtpSettings->name,
                    ],
                    'encryption' => $smtpSettings->encryption,
                    'username'   => $smtpSettings->username,
                    'password'   => $smtpSettings->password
                ];
    
                Config::set('mail', $config);
            }
        }

        Paginator::defaultView('components.pagination-links');

        Route::model('page', Page::class);
        Route::model('post', BlogPost::class);

        Filament::serving(function(): void {
            Filament::registerTheme(mix('css/theme.css'));
        });

        Filament::registerNavigationGroups([
            'Administration',
            'Content',
            'Settings',
        ]);

        Tools::can(function (User $user): bool {
            return ($user->admin || $user->super_admin);
        });

        Tools::navigationIcon('heroicon-o-scissors');
        Tools::navigationGroup('Administration');

        Tools::register(function (Tool $tool): Tool {
            return $tool->label('Sitemap Generator')->schema([
                Components\ViewField::make('submission')->view('filament.tools.sitemapAlert')->label('')
            ])->onSubmit(function (ToolInput $input) {
                generate_new_sitemap();

                $input->notify('success', 'Generated a new sitemap at ' . url('sitemap.xml'));
            });
        });

        Tools::register(function (Tool $tool): Tool {
            return $tool->label('Symlink Generator')->schema([
                Components\ViewField::make('submission')->view('filament.tools.symlinkAlert')->label('')
            ])->onSubmit(function (ToolInput $input) {

                try {
                    if(File::isDirectory(public_path('storage')) && File::isEmptyDirectory(public_path('storage'))) {
                        File::deleteDirectory(public_path('storage'));
                    }

                    if(File::exists(public_path('storage'))) {
                        File::delete(public_path('storage'));
                    }

                    Artisan::call('storage:link');

                    $input->notify('success', 'Added a symlink successfully.');
                } catch(\Exception $e) {
                    throw $e;
                    $input->notify('danger', 'Symlink could not be created for some unkown reason.');
                }
            });
        });

        Tools::register(function (Tool $tool): Tool {
            return $tool->label('Destroy')->schema([
                Components\Select::make('objects')->label('Objects to Destroy')->options([
                    'cache'        => 'Cache',
                    'view-cache'   => 'Views Cache',
                    'config-cache' => 'Config Cache'
                ])->required()
            ])->onSubmit(function(ToolInput $input) {
                if( $input->get('objects') == 'cache' ) {
                    cache()->flush();

                    $input->notify('success', 'Successfully destroyed cache.');
                } else if($input->get('objects') == 'view-cache') {
                    Artisan::call('view:clear');

                    $input->notify('success', 'Views Cache destroyed successfully.');
                } else if($input->get('objects') == 'config-cache') {
                    Artisan::call('config:clear');

                    $input->notify('success', 'Configuration Cache destroyed successfully.');
                }
            });
        });

        if(auth()->check()) {
            $user = User::find(auth()->user()->id);

            if($user->allow_till < now()) {
                $user->allow_till = NULL;

                $user->save();
            }
        }
    }
}

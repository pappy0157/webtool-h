<?php

namespace App\Filament\Pages;

use App\Bitflan;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ZipArchive;

class Update extends Page
{
    protected static ?int    $navigationSort  = 1;
    protected static ?string $navigationIcon  = 'heroicon-o-upload';
    protected static ?string $navigationGroup = 'Administration'; 

    protected static string $view = 'filament.pages.update';

    public bool $loading = false;

    public function submit() {
        if(Bitflan::DEMO_MODE) {
            $this->notify('success', 'Disabled in Demo Mode!');
            return;
        }

        if(File::exists( base_path('upload.zip') )) {
            if( class_exists( 'ZipArchive' ) ) {
                $this->loading = true;

                $zip = new ZipArchive();
                $res = $zip->open(base_path('upload.zip'));

                if($res === TRUE) {
                    $env = File::get(base_path('.env'));
                    $zip->extractTo(base_path());
                    $zip->close();

                    File::put(base_path('.env'), $env);

                    Artisan::call('migrate --force --database=mysql');
                    File::delete(base_path('upload.zip'));

                    $this->notify('success', 'Updated script to the newer version successfully!');
                    $this->loading = false;
                }
            } else
                $this->notify('danger', 'Zip Archive Extension not installed or Enabled. Please extract manually and run migrations using the command line.');
        } else
            $this->notify('danger', 'File "upload.zip" not found in the root of the website.');
    }
}

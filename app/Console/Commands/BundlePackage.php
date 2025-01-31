<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BundlePackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:bitflan-package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Packages the entire Application into a releasable build.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $temp = sys_get_temp_dir() . '\\bitflan';
        $path = base_path( '.package' );

        if(File::exists($path))
            File::deleteDirectory($path);

        File::copyDirectory(base_path(), $temp);
        File::moveDirectory($temp, $path, true);

        if(File::exists($path . '\\.package'))
            File::deleteDirectory($path . '\\.package');
        if(File::exists($path . '\\.vscode'))
            File::deleteDirectory($path . '\\.vscode');
        if(File::exists($path . '\\.git'))
            File::deleteDirectory($path . '\\.git');

        if(File::exists($path . '\\node_modules'))
            File::deleteDirectory($path . '\\node_modules');

        // File::deleteDirectory($path . '\\storage\\app');
        // File::makeDirectory($path . '\\storage\\app');
        // File::put($path . '\\storage\\app\\.gitignore', '');

        // File::makeDirectory($path . '\\storage\\app\\livewire-tmp');

        // File::makeDirectory($path . '\\storage\\app\\public');
        // File::put($path . '\\storage\\app\\public\\.gitignore', '');

        File::delete(File::glob( $path . '\\storage\\bitflan\\*.stp' ));

        File::deleteDirectory($path . '\\storage\\logs');
        File::makeDirectory($path . '\\storage\\logs');
        File::put($path . '\\storage\\logs\\.gitignore', '');

        File::deleteDirectory($path . '\\storage\\framework');
        File::makeDirectory($path . '\\storage\\framework');

        File::deleteDirectory($path . '\\storage\\framework\\views');
        File::makeDirectory($path . '\\storage\\framework\\views');
        File::put($path . '\\storage\\framework\\views\\.gitignore', '');

        File::deleteDirectory($path . '\\storage\\framework\\sessions');
        File::makeDirectory($path . '\\storage\\framework\\sessions');
        File::put($path . '\\storage\\framework\\sessions\\.gitignore', '');

        File::deleteDirectory($path . '\\storage\\framework\\testing');
        File::makeDirectory($path . '\\storage\\framework\\testing');
        File::put($path . '\\storage\\framework\\testing\\.gitignore', '');

        File::deleteDirectory($path . '\\storage\\framework\\cache');
        File::makeDirectory($path . '\\storage\\framework\\cache');
        File::makeDirectory($path . '\\storage\\framework\\cache\\data');
        File::put($path . '\\storage\\framework\\cache\\.gitignore', '');
        File::put($path . '\\storage\\framework\\cache\\data\\.gitignore', '');

        
        if(File::exists($path . '\\.env.example'))
            File::delete($path . '\\.env.example');

        if(File::isDirectory($path . '\\public\\storage'))
            File::deleteDirectory($path . '\\public\\storage');

        $env = File::get($path . '\\storage\\bitflan\\default.env');
        File::put($path . '\\.env', $env);
    }
}

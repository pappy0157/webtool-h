<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeWebTool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:webtool {pascal} {dash}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffolds a new Web Tool.';

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
        $pascal = $this->argument('pascal');
        $dash   = $this->argument('dash');
        $files  = [];

        $settings_template = File::get(app_path('Console/Commands/Templates/settings.tmpl'));   
        $settings_template = Str::replace('{pascal}', $pascal, $settings_template);
        $settings_template = Str::replace('{dash}', $dash, $settings_template);

        $page_template = File::get(app_path('Console/Commands/Templates/settings-page.tmpl'));   
        $page_template = Str::replace('{pascal}', $pascal, $page_template);
        $page_template = Str::replace('{formatted}', ucwords(Str::replace('-', ' ', $dash)), $page_template);

        $files[] = [
            app_path('Settings/Tools/' . $pascal . 'Settings.php'),
            $settings_template
        ];

        $files[] = [
            app_path('Filament/Pages/Tools/Manage' . $pascal . 'Settings.php'),
            $page_template
        ];

        $tool_slugs = File::get(app_path('Settings/ToolSlugSettings.php'));
        $tool_slugs = Str::replace('public static function group(): string {', 'public ?string $' . $pascal . ';' . "\n\n" . 'public static function group(): string {', $tool_slugs);

        $files[] = [
            app_path('Settings/ToolSlugSettings.php'),
            $tool_slugs
        ];

        // dd($files);

        File::makeDirectory(path: base_path('resources/views/modules/tools/' . $dash), force: true);
        File::put( base_path('resources/views/modules/tools/' . $dash . '/header.blade.php'),   File::get(app_path('Console/Commands/Templates/header.tmpl')));
        File::put( base_path('resources/views/modules/tools/' . $dash . '/selector.blade.php'), File::get(app_path('Console/Commands/Templates/selector.tmpl')));
        File::put( base_path('resources/views/modules/tools/' . $dash . '/livewire.blade.php'), File::get(app_path('Console/Commands/Templates/livewire.tmpl')));

        foreach($files as $file) {
            File::put($file[0], $file[1]);
        }

        Artisan::call('make:settings-migration Add' . $pascal . 'ToolSettings');

        $this->info('Created ' . $pascal . ' Web Tool successfully.');
    }
}

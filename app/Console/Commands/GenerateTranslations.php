<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates initial translations for tools.';

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
        $cats = config('tools.categories');

        foreach($cats as $category) {
            foreach($category['tools'] as $tool) {
                $setting = app($tool['settings']);

                $name = $tool['name'];

                $content = File::get(app_path('Console/Commands/Templates/translation.tmpl'));

                $content = str_replace('{{title}}', addslashes($setting->title), $content);
                $content = str_replace('{{summary}}', addslashes($setting->summary), $content);
                $content = str_replace('{{description}}', addslashes($setting->description), $content);

                if(!File::exists(base_path('lang/en/webtools/tools/' . $name . '.php')))
                    File::put(base_path('lang/en/webtools/tools/' . $name . '.php'), $content);
            }
        }
    }
}

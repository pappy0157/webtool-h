@if(app(\App\Settings\LanguageSettings::class)->translateTools)
    <div class="flex items-center p-2 leading-none text-indigo-100 bg-indigo-800 lg:rounded-full lg:inline-flex"
        role="alert">
        <span class="flex px-2 py-1 mr-3 text-xs font-bold uppercase bg-indigo-500 rounded-full">Note</span>
        <span class="flex-auto mr-2 font-semibold text-left"><strong>Language Settings > Translate Tool Titles & Descriptions</strong> option is turned on. Therefore titles & descriptions from Language Files will be used instead of these settings. If you want to change the Titles & Descriptions from the admin panel, Turn off the option in Language Settings. SEO Description & Keywords will be used as-is. Please read the bundled documentation for more information.</span>
    </div>
@endif
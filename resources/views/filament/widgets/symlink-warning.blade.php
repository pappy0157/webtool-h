<div class="col-span-2 filament-widget">
    @if(!function_exists('symlink'))
        <div class="flex flex-col p-2 text-indigo-100 bg-red-800 lg:rounded-md" role="alert">
            <span class="flex p-2 m-2 text-xs font-bold text-center uppercase bg-red-500 rounded-md">Warning</span>
            <span class="flex-auto mt-2 font-semibold text-left">The "symlink()" function on your server does not exist or is disabled. Currently, an alternative solution is being used but it is slow and inefficient. Please contact your hosting provider to enable the "symlink()" function and Generate a Symbolic Link from the "Tools" page.</span>
        </div>
    @endif
</div>
@if(file_exists( base_path( 'upload.zip' ) ))
    <div class="flex items-start px-3 py-2 space-x-2 text-sm text-green-600 rounded shadow backdrop-blur-xl backdrop-saturate-150 rtl:space-x-reverse ring-1 bg-green-50/50 ring-green-400">Ready to Update! Press the Button down below to update.</div>
@else
    <div class="flex items-start px-3 py-2 space-x-2 text-sm rounded shadow backdrop-blur-xl backdrop-saturate-150 rtl:space-x-reverse text-danger-400 ring-1 bg-danger-50/50 ring-danger-200">Put the upload.zip file in the root of your website to update your script.</div>
@endif


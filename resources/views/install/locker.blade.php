<form wire:submit.prevent="submitLicense">
    <div>
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="font-bold">You must Link your Domain to your License</p>
                <p class="text-sm">
                    Before you can verify your license here, You will need to activate your license for this domain. Please follow <a class="underline font-bold" href="#" target="_blank">this</a> link to activate your license. Also make sure to enter your domain name without WWW or the Protocol.
                </p>
            </div>
            </div>
        </div>

        @if($this->licenseError !== false)
            <div class="mt-3 w-full p-2 bg-red-800 text-red-100 items-center leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ $this->licenseError }}</span>
            </div>
        @endif

        <label class="mt-3 block text-gray-700 text-sm font-bold mb-2" for="pcode">
            Purchase Code
        </label>
        <input wire:model.defer="licenseKey" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pcode" type="text" placeholder="Your Envato purchase code here.">
        <a class="text-xs text-gray-600 mt-3" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">Can't find your purchase code?</a>
    </div>

    <div class="mt-6 text-right">
        <hr />
        <button wire:loading.class="opacity-75" class="mt-6 cursor-pointer bg-indigo-600 text-white rounded-sm py-2 px-6">Submit</button>
    </div>
</form>
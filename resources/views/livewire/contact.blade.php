<form method="POST" wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
    <div class="row">
        @if($this->success === true)
            <div class="col-lg-12">
                <div class="alert alert-success bg-success input-alerts">{{ trans('contact.contact-sent') }}</div>
            </div>
        @elseif($this->success === false)
            <div class="col-lg-12">
                <div class="alert alert-danger input-alerts">{{ trans('contact.contact-error') }}</div>
            </div>
        @endif

        @if(session('recaptcha-error') == true)
            <div class="col-lg-12">
                <div class="alert alert-danger input-alerts">{{ trans('contact.recaptcha-required') }}</div>
            </div>
        @endif

        <div class="col-lg-6">
            <div class="form-group">
                <input required wire:model.defer="name" class="custom-input" placeholder="{{ trans('contact.name') }}">
                @error('name')
                    <div class="alert alert-danger input-alerts">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input required wire:model.defer="email" type="email" class="custom-input" placeholder="{{ trans('contact.email') }}">
                @error('email')
                    <div class="alert alert-danger input-alerts">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <textarea required wire:model.defer="message" class="rounded custom-textarea rounded" placeholder="{{ trans('contact.message') }}" rows="9"></textarea>
                @error('message')
                    <div class="alert alert-danger input-alerts">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @if($recaptcha)
            <div wire:ignore class="col-12 mb-3">
                <div class="g-recaptcha" data-sitekey="{{ $siteKey }}"></div>
            </div>
        @endif

        <div class="col-12">
            <button wire:loading.attr="disabled" wire:loading.class="disabled" class="btn custom--btn button__lg">{{ trans('contact.submit') }}</button>
        </div>
    </div>
</form>
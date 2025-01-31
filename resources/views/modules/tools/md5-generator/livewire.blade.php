<div>
    <div class="mb-5 form-group">
        <label class="custom-label">{{ trans('webtools/tools/md5-generator.label') }}</label>
        <div class="copy-textarea-btn">
            <textarea wire:model.defer='content' class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/md5-generator.placeholder') }}" rows="5"></textarea>
        </div>
        <button wire:loading.class="disabled" wire:click='generate' class="btn custom--btn button__lg">{{ trans('webtools/tools/md5-generator.submit') }}</button>
    </div>

    <div x-data class="copy-input @if($this->hash == '') d-none @endif">
        <input wire:model.defer='hash' x-ref="text" disabled type="text" class="custom-input disabled" placeholder="{{ trans('webtools/tools/md5-generator.result-placeholder') }}">
        <button x-on:click="window.writeClipboardText($event, $refs.text.value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>
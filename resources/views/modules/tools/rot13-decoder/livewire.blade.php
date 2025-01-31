<div>
    @if($this->status == 'error')
        <div class="alert alert-danger mb-2">{{ trans('webtools/tools/rot13-decoder.error') }}</div>
    @endif

    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/rot13-decoder.label') }}</label>
        <textarea rows="4" type="text" wire:model.defer='content' class="custom-textarea rounded" placeholder="{{ trans('webtools/tools/rot13-decoder.placeholder') }}"></textarea>
    </div>

    <div class="form-group">
        <button wire:loading.class="disabled" wire:click='generate' class="btn custom--btn button__lg mt-2 mb-2">{{ trans('webtools/tools/rot13-decoder.submit') }}</button>
    </div>

    <div x-data class="form-group @if($this->converted == '') d-none @endif">
        <textarea rows="4" id="textarea" class="custom-textarea rounded" rows="10">{!! $this->converted !!}</textarea>
        <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('textarea').value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>
<div>
    @if($this->status == 'error')
        <div class="alert alert-danger mb-2">{{ trans('webtools/tools/source-code-downloader.error') }}</div>
    @endif

    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/source-code-downloader.label') }}</label>
        <input type="text" wire:model.defer='url' class="custom-input" placeholder="{{ trans('webtools/tools/source-code-downloader.placeholder') }}" />
        <button wire:loading.class="disabled" wire:click='generate' class="btn custom--btn button__lg mt-2">{{ trans('webtools/tools/source-code-downloader.submit') }}</button>
    </div>

    <div x-data class="form-group @if($this->code == '') d-none @endif">
        <textarea id="textarea" class="custom-textarea rounded" rows="10">{!! $this->code !!}</textarea>
        <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('textarea').value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>
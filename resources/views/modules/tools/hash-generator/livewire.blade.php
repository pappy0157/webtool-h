<div>
    <div class="form-group">
        <select wire:model.defer='type' class="form-select custom-input">
            @foreach (hash_algos() as $i => $algo)
                <option {{ $i == 0 ? 'selected' : '' }} value="{{ $algo }}">{{ strtoupper($algo) }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-5 form-group">
        <label class="custom-label">{{ trans('webtools/tools/hash-generator.label') }}</label>
        <div class="copy-textarea-btn">
            <textarea wire:model.defer='content' class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/hash-generator.placeholder') }}" rows="5"></textarea>
        </div>
        <button wire:loading.class="disabled" wire:click='generate' class="btn custom--btn button__lg">{{ trans('webtools/tools/hash-generator.submit') }}</button>
    </div>

    <div x-data class="copy-input @if($this->hash == '') d-none @endif">
        <input wire:model.defer='hash' x-ref="text" disabled type="text" class="custom-input disabled" placeholder="Generated Hash will be Here">
        <button x-on:click="window.writeClipboardText($event, $refs.text.value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>
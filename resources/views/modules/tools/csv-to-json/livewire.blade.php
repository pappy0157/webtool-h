<section>
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/csv-to-json.keys-label') }}</label>
        <select wire:model.defer='keys' class="form-select custom-input">
            <option selected value="nokeys">{{ trans('webtools/tools/csv-to-json.keys-nokeys') }}</otion>
            <option value="keys">{{ trans('webtools/tools/csv-to-json.keys-rows') }}</option>
        </select>
    </div>
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/csv-to-json.label') }}</label>
        <textarea wire:model.defer="csv" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/csv-to-json.placeholder') }}" rows="5"></textarea>
    </div>
    <button wire:click='submit' class="btn custom--btn button__lg">{{ trans('webtools/tools/csv-to-json.submit') }}</button>
    
    @if($this->json && $this->code != 1)
        <hr class="">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="" class="custom-label">{{ trans('webtools/tools/csv-to-json.result-label') }}</label>
                    <div class="copy-textarea-btn">
                        <textarea id="csvArea" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/csv-to-json.result-placeholder') }}" rows="5">{!! $this->json !!}</textarea>
                        <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('csvArea').value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @elseif($this->code == 1)
        <hr class="">
        <div class="border-0 alert alert-danger rounded-pill bg-danger">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/csv-to-json.error-text') }}</h5>
            <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ trans('webtools/tools/csv-to-json.error') }}</h5>
        </div>
    @endif
</section>
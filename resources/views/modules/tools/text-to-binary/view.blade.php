<section x-data="{ input: '', encoded: '' }">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/text-to-binary.label') }}</label>
        <textarea x-model="input" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/text-to-binary.placeholder') }}" rows="5"></textarea>
    </div>
    <button x-on:click="encoded = ''; for(let i=0;i<input.length;i++) { encoded += input[i].charCodeAt(0).toString(2) + ' ' }; encoded = encoded.trim()" class="btn custom--btn button__lg">{{ trans('webtools/tools/text-to-binary.submit') }}</button>
    
    <hr class="">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/text-to-binary.result-label') }}</label>
                <div class="copy-textarea-btn">
                    <textarea x-model="encoded" type="email" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/text-to-binary.result-placeholder') }}" rows="5"></textarea>
                    <button x-on:click="window.writeClipboardText($event, encoded)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
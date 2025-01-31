<section x-data="{ input: 3, mode: 3, lorem: new Lorem() }">
    <div class="form-group">
        <label for="" class="custom-label">{{ trans('webtools/tools/lorem-ipsum-generator.label') }}</label>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <input x-on:input="input = parseInt($el.value)" value="3" type="number" class="custom-input" placeholder="{{ trans('webtools/tools/lorem-ipsum-generator.amount') }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group d-lg-flex">
                <div class="form-check me-3">
                    <input x-on:change="mode = Lorem.TYPE.WORD" class="form-check-input" type="radio" name="btcradio" id="words" checked>
                    <label class="form-check-label" for="words">
                        {{ trans('webtools/tools/lorem-ipsum-generator.words') }}
                    </label>
                </div>
                <div class="form-check me-3">
                    <input x-on:change="mode = Lorem.TYPE.SENTENCE" class="form-check-input" type="radio" name="btcradio" id="sentences">
                    <label class="form-check-label" for="sentences">
                        {{ trans('webtools/tools/lorem-ipsum-generator.sentences') }}
                    </label>
                </div>
                <div class="form-check me-3">
                    <input x-on:change="mode = Lorem.TYPE.PARAGRAPH" class="form-check-input" type="radio" name="btcradio" id="paras">
                    <label class="form-check-label" for="paras">
                        {{ trans('webtools/tools/lorem-ipsum-generator.paragraphs') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <button x-on:click="$refs.area.value = lorem.createText(input, mode);" class="btn custom--btn button__lg">{{ trans('webtools/tools/lorem-ipsum-generator.submit') }}</button>

    <hr class="small-marg">
    <div class="mb-5 form-group">
        <label for="" class="custom-label">{{ trans('webtools/tools/lorem-ipsum-generator.result-label') }}</label>
        <div class="copy-textarea-btn">
            <textarea x-ref="area" type="email" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/lorem-ipsum-generator.result-placeholder') }}" rows="5"></textarea>
            <button x-on:click="window.writeClipboardText($event, $refs.area.value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
        </div>
    </div>
</section>
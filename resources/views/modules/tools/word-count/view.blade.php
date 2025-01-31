<div x-data="{ words: 0, letters: 0 }">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/word-count.label') }}</label>
        <textarea x-on:input="letters = $el.value.length; words = $el.value.trim().split(/\s+/).length" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/word-count.placeholder') }}" rows="5"></textarea>
    </div>
    <hr class="small-marg">
    <div class="row">
        <div class="col-6">
            <div x-on:click="window.writeClipboardText($event, words)" class="custom--btn btn-block btn btn__dark button__lg btn__bordered">
                <strong>{{ trans('webtools/tools/word-count.words') }}</strong> <span class="badge bg-dark ms-1" x-text="words">0</span>
            </div>
        </div>
        <div class="col-6">
            <div x-on:click="window.writeClipboardText($event, letters)" class="custom--btn btn-block btn btn__dark button__lg btn__bordered">
                <strong>{{ trans('webtools/tools/word-count.letters') }}</strong> <span class="badge bg-dark ms-1" x-text="letters">0</span>
            </div>
        </div>
    </div>
</div>
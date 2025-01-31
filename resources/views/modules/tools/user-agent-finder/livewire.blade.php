<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="" class="custom-label">{{ trans('webtools/tools/user-agent-finder.label') }}</label>
            <div class="copy-textarea-btn">
                <textarea type="email" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/user-agent-finder.placeholder') }}" rows="5">{{ $this->agent }}</textarea>
                <button class="btn custom--btn button__md copy-btn btn__dark" onclick="window.writeClipboardTextVanilla(this, '{{ $this->agent }}')">{{ trans('webtools/general.copy') }}</button>
            </div>
        </div>
    </div>
</div>
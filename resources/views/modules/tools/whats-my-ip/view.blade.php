<div class="form-group">
    <label for="" class="custom-label">{{ trans('webtools/tools/whats-my-ip.label') }} </label>
</div>
<div class="form-group">
    <div x-data class="copy-input">
        <input x-ref="text" disabled type="text" class="custom-input disabled" value="{{ getClientIp() }}">
        <button x-on:click="window.writeClipboardText($event, $refs.text.value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>
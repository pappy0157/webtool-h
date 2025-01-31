@push('alpine-components')
    <script>
        window.bitflanTextReplacerComponent = function() {
            return {
                data: 0,
                converted: false,

                generate() {
                    this.$refs.textarea.value = window.convertUnits(Number(this.data), this.$refs.from.value, this.$refs.to.value);
                    this.converted = true;
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanTextReplacerComponent()">
    <div class="form-group">
        <input type="number" x-model="data" value="0" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/memory-storage-converter.data') }}" />
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/memory-storage-converter.from') }}</label>
                <select x-ref="from" class="custom-input form-select">
                    <option value="bit">bit (b)</option>
                    <option value="kilobit">kilobit (kb)</option>
                    <option value="megabit">megabit (Mb)</option>
                    <option value="gigabit">gigabit (Gb)</option>
                    <option value="terabit">terabit (Tb)</option>
                    <option value="petabit">petabit (Pb)</option>
                    <option value="nibble">nibble</option>
                    <option value="byte">byte (B)</option>
                    <option value="kilobyte" selected="selected">kilobyte (kB)</option>
                    <option value="megabyte">megabyte (MB)</option>
                    <option value="gigabyte">gigabyte (GB)</option>
                    <option value="terabyte">terabyte (TB)</option>
                    <option value="petabyte">petabyte (PB)</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/memory-storage-converter.to') }}</label>
                <select x-ref="to" class="custom-input form-select">
                    <option value="bit">bit (b)</option>
                    <option value="kilobit">kilobit (kb)</option>
                    <option value="megabit">megabit (Mb)</option>
                    <option value="gigabit">gigabit (Gb)</option>
                    <option value="terabit">terabit (Tb)</option>
                    <option value="petabit">petabit (Pb)</option>
                    <option value="nibble">nibble</option>
                    <option value="byte">byte (B)</option>
                    <option value="kilobyte">kilobyte (kB)</option>
                    <option value="megabyte" selected="selected">megabyte (MB)</option>
                    <option value="gigabyte">gigabyte (GB)</option>
                    <option value="terabyte">terabyte (TB)</option>
                    <option value="petabyte">petabyte (PB)</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button x-on:click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/memory-storage-converter.submit') }}</button>
    </div>

    <div class="form-group" x-cloak x-show="converted">
        <textarea id="textarea" class="custom-textarea rounded" cols="30" rows="5" x-ref="textarea"></textarea>
        <button x-on:click="window.writeClipboardText($event, $refs.textarea.value)" class="btn custom--btn button__md btn__dark">Copy</button>
    </div>
</div>
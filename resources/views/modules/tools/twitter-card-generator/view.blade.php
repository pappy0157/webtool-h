@push('alpine-components')
    <script>
        window.bitflanTwitterCardComponent = function() {
            return {
                editor: null,

                description: '',
                websiteName: '',
                websiteUrl: '',
                imageUrl: '',
                username: '',

                value: '',
                tags: [],

                init() {
                    this.editor = new CodeFlask(this.$refs.editor, { language: 'html', lineNumbers: true, readonly: true });
                },

                generate() {
                    this.tags = [
                        `<meta name="twitter:card" content="summary">`,
                        `<meta name="twitter:site" content="@${this.username}">`,
                        `<meta name="twitter:title" content="${this.websiteName}">`,
                        `<meta name="twitter:description" content="${this.description}">`,
                        `<meta name="twitter:image" content="${this.imageUrl}">`,
                    ];

                    this.value = this.tags.join('\n');
                    this.editor.updateCode(this.value);
                }
            }
        }
    </script>
@endpush

<section x-data="window.bitflanTwitterCardComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/twitter-card-generator.label') }}</label>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <input x-model="websiteName" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/twitter-card-generator.titleField') }}">
            </div>

            <div class="form-group">
                <input x-model="username" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/twitter-card-generator.username') }}">
            </div>
    
            <div class="form-group">
                <input x-model="imageUrl" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/twitter-card-generator.image') }}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <textarea x-model="description" name="" class="rounded custom-textarea" rows="8" placeholder="{{ trans('webtools/tools/twitter-card-generator.descriptionField') }}"></textarea>
            </div>
        </div>
    </div>
    <button x-on:click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/twitter-card-generator.submit') }}</button>

    <hr>

    <div class="form-group position-relative">
        <button @click="window.writeClipboardText($event, editor.getCode())" class="btn custom--btn button__md ace-copy-btn btn__dark">Copy</button>
        <div id="editor" x-ref="editor"></div>
    </div>
</section>
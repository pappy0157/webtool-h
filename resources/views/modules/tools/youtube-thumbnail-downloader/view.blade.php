@push('alpine-components')
    <script>
        window.bitflanURLExtractorComponent = function() {
            return {
                id: '',

                youtube_parser(url){
                    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
                    var match = url.match(regExp);
                    return (match&&match[7].length==11)? match[7] : false;
                },

                submit() {
                    this.id = this.youtube_parser(this.$refs.input.value);

                    if(!this.id) {
                        alert('Invalid ID');
                    }
                },
                download() {
                    this.id = this.youtube_parser(this.$refs.input.value);

                    if(!this.id) {
                        alert('Invalid ID');
                    }
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanURLExtractorComponent()">
    <div class="mb-5 form-group">
        <label class="custom-label">{{ trans('webtools/tools/youtube-thumbnail-downloader.label') }}</label>
        <input type="text" x-ref="input" class="rounded custom-input" placeholder="{{ trans('webtools/tools/youtube-thumbnail-downloader.placeholder') }}" rows="5"></textarea>
        <button x-on:click="submit()" class="btn custom--btn button__lg mt-2">{{ trans('webtools/tools/youtube-thumbnail-downloader.submit') }}</button>
    </div>

    <template x-if="id">
        <div>
            <img x-ref="img" class="d-block mt-2" :src="`http://img.youtube.com/vi/${id}/0.jpg`" alt="Thumbnail">
            <a x-cloak x-show="id" x-ref="download_link" x-bind:download="`${id}`" x-bind:href="`{{ url('download-thumb') }}/${id}`" class="btn custom--btn button__lg mt-2">Download Image</a>
        </div>
    </template>
</div>



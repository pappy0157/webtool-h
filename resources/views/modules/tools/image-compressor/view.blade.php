@push('alpine-components')
    <script>
        window.bitflanConvertComponent = function() {
            return {
                quality: 50,

                generate() {
                    let canvas  = this.$refs.canvas;
                    let ctx     = canvas.getContext('2d');
                    let a       = this.$refs.anchor;
                    let quality = this.quality / 100;

                    const name = this.$refs.upload.files[0].name;
                    const type = this.$refs.upload.files[0].type;

                    var reader = new FileReader();
                    reader.onload = function(event){
                        var img = new Image();
                        img.onload = () => {

                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img,0,0);

                            a.href     = canvas.toDataURL(type, quality);
                            a.setAttribute('download', name);
                            a.click();
                        }
                        img.src = event.target.result;
                    }
                    reader.readAsDataURL(this.$refs.upload.files[0]);
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanConvertComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/image-compressor.image') }}</label>
        <input type="file" x-ref="upload" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp,image/svg" />
    </div>
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/image-compressor.quality') }}</label>
        <div class="d-flex align-items-center">
            <input x-model:value="quality" type="range" class="form-range" x-ref="range" min="10" step="5" max="60" value="30" />
            <div class="dimension-percentage-value text-end d-flex ms-2 badge bg-secondary pt-0 rounded lh-lg"><strong x-text="Math.trunc(Math.ceil(quality * 1.66) / 10) * 10" id="rangeValue" class="">50</strong>%</div>
        </div>
    </div>

    <div class="form-group">
        <button @click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/image-compressor.submit') }}</button>
    </div>

    <div class="d-none">
        <canvas x-ref="canvas"></canvas>
        <a href="#" x-ref="anchor" download="image.jpg"></a>
    </div>
</div>

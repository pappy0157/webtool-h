@push('alpine-components')
    <script>
        window.bitflanConvertComponent = function() {
            return {
                setSize() {
                    const setSize = (width, height) => {
                        this.$refs.width.value = width;
                        this.$refs.height.value = height;
                    }

                    var reader = new FileReader();
                    reader.onload = function(event){
                        var img = new Image();
                        img.onload = () => {
                            setSize(img.width, img.height)
                        }
                        img.src = event.target.result;
                    }
                    reader.readAsDataURL(this.$el.files[0]); 
                },

                generate() {
                    let canvas = this.$refs.canvas;
                    let ctx    = canvas.getContext('2d');
                    let a      = this.$refs.anchor;

                    const width  = this.$refs.width.value;
                    const height = this.$refs.height.value;

                    const setSize = (width, height) => {
                        this.$refs.width.value = width;
                        this.$refs.height.value = height;
                    }

                    var reader = new FileReader();
                    reader.onload = function(event){
                        var img = new Image();
                        img.onload = () => {
                            canvas.width = width;
                            canvas.height = height;

                            setSize(width, height)

                            ctx.drawImage(img,0,0, canvas.width, canvas.height);

                            a.href = canvas.toDataURL('image/png', 1);
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
        <label class="custom-label">{{ trans('webtools/tools/image-resizer.image') }}</label>
        <input x-on:change="setSize()" type="file" x-ref="upload" class="form-control" accept="image/png,image/jpeg,image/jpg,image/webp,image/svg" />
    </div>
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/image-resizer.width') }}</label>
        <input type="number" value="0" x-ref="width" class="custom-input" />
    </div>
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/image-resizer.height') }}</label>
        <input type="number" value="0" x-ref="height" class="custom-input" />
    </div>
    <div class="form-group">
        <button @click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/image-resizer.submit') }}</button>
    </div>

    <div class="d-none">
        <canvas x-ref="canvas"></canvas>
        <a href="#" x-ref="anchor" download="image.png"></a>
    </div>
</div>
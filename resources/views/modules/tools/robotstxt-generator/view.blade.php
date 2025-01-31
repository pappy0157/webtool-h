@push('alpine-components')
    <script>
        window.bitflanRobotstxtComponent = function() {
            return {
                usual: 'allowed',
                delay: 'default',
                sitemap: '',
                dirs: '',

                google: 'allowed',
                google_images: 'allowed',
                google_mobile: 'allowed',
                msn: 'allowed',
                yahoo: 'allowed',
                yahoo_mm: 'allowed',
                yahoo_blogs: 'allowed',
                ask: 'allowed',
                gigablast: 'allowed',
                dmoz: 'allowed',
                nutch: 'allowed',
                alexa: 'allowed',
                baidu: 'allowed',
                naver: 'allowed',
                msn_pic: 'allowed',

                text: '',

                editor: null,

                init() {
                    this.editor = ace.edit(this.$refs.editor);
                    this.editor.setOption("showPrintMargin", false);
                },

                generate() {
                    this.text = '';

                    this.text += `\nUser-agent: Googlebot\nDisallow: ${this.google == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: googlebot-image\nDisallow: ${this.google_images == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: googlebot-mobile\nDisallow: ${this.google_mobile == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: Robozilla\nDisallow: ${this.dmoz == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: Slurp\nDisallow: ${this.yahoo == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: Gigabot\nDisallow: ${this.gigablast == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: MSNBot\nDisallow: ${this.msn == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: Teoma\nDisallow: ${this.ask == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: Nutch\nDisallow: ${this.nutch == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: baiduspider\nDisallow: ${this.baidu == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: naverbot\nDisallow: ${this.naver == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: yeti\nDisallow: ${this.naver == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: yahoo-mmcrawler\nDisallow: ${this.yahoo_mm == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: psbot\nDisallow: ${this.msn_picsearch == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: yahoo-blogs/v3.9\nDisallow: ${this.yahoo_blogs == 'allowed' ? '' : '/'}`;
                    this.text += `\nUser-agent: ia_archiver/v3.9\nDisallow: ${this.alexa == 'allowed' ? '' : '/'}`;

                    this.text += `\nUser-agent: *\nDisallow: ${this.usual == 'allowed' ? '' : '/'}`;

                    if(this.delay != 'default')
                        this.text += '\nCrawl-delay: ' + this.delay;

                    this.dirs.split(',').forEach(item => {
                        if(item.trim())
                            this.text += '\nDisallow: ' + item;
                    });

                    if(this.sitemap)
                        this.text += '\nSitemap: ' + this.sitemap;

                    this.editor.session.setValue(this.text);
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanRobotstxtComponent()">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/robotstxt-generator.default_for_all') }}</label>
                <select x-model="usual" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/robotstxt-generator.crawl_delay') }}</label>
                <select x-model="delay" class="custom-input form-select">
                    <option selected value="default">None</option>
                    <option value="5">5 Seconds</option>
                    <option value="10">10 Seconds</option>
                    <option value="20">20 Seconds</option>
                    <option value="60">60 Seconds</option>
                    <option value="120">120 Seconds</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/robotstxt-generator.sitemap') }}</label>
        <input x-model="sitemap" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/robotstxt-generator.sitemap_holder') }}">
    </div>

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Google</label>
                <select x-model="google" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Google Images</label>
                <select x-model="google_images" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Google Mobile</label>
                <select x-model="google_mobile" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>
    
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">MSN Search</label>
                <select x-model="msn" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Yahoo</label>
                <select x-model="yahoo" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Yahoo MM</label>
                <select x-model="yahoo_mm" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Yahoo Blogs</label>
                <select x-model="yahoo_blogs" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Ask/Teeoma</label>
                <select x-model="ask" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">GigaBlast</label>
                <select x-model="gigablast" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">DMOZ Checker</label>
                <select x-model="dmoz" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Nutch</label>
                <select x-model="nutch" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Alexa / Wayback</label>
                <select x-model="alexa" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Baidu</label>
                <select x-model="baidu" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">Naver</label>
                <select x-model="naver" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="custom-label">MSN PicSearch</label>
                <select x-model="msn_pic" class="custom-input form-select">
                    <option selected value="allowed">{{ trans('webtools/tools/robotstxt-generator.allowed') }}</option>
                    <option value="refused">{{ trans('webtools/tools/robotstxt-generator.refused') }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/robotstxt-generator.directories') }}</label>
        <input x-model="dirs" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/robotstxt-generator.directories_holder') }}">
    </div>

    <button x-on:click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/robotstxt-generator.submit') }}</button>

    <div class="row mt-2" x-cloak x-show="text">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, editor.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    <div x-ref="editor" id="editor"></div>
                </div>
            </div>
        </div>
    </div>
</div>
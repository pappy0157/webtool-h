window.bitflanSEOTagsGeneratorComponent = function() {
    return {
        editor: null,

        title: '',
        description: '',
        websiteName: '',
        websiteUrl: '',
        websiteType: 'article',
        imageUrl: '',

        value: '',
        tags: [],

        init() {
            this.editor = new CodeFlask(this.$refs.editor, { language: 'html', lineNumbers: true, readonly: true });
        },

        generate() {
            this.tags = [
                `<title>${this.title}</title>`,
                `<meta name="description" content="${ this.description }" />`,
                '',
                `<meta property="og:title" content="${ this.title }">`,
                `<meta property="og:site_name" content="${ this.websiteName }">`,
                `<meta property="og:url" content="${ this.websiteUrl }">`,
                `<meta property="og:description" content="${ this.description }">`,
                `<meta property="og:type" content="${ this.websiteType }">`,
                `<meta property="og:image" content="${ this.imageUrl }">`
            ];

            this.value = this.tags.join('\n');
            this.editor.updateCode(this.value);
        }
    }
};
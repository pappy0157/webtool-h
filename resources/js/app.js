import Alpine from "alpinejs"

window.Alpine = Alpine;

window.fallbackWriteClipboardText = function(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;

    // Avoid scrolling to bottom
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Fallback: Copying text command was ' + msg);
    } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
}

window.writeClipboardTextVanilla = function(el, text) {
    el.innerHTML = window.copiedIntlString;

    if (!navigator.clipboard) {
        window.fallbackWriteClipboardText(text);
        return;
    }
    navigator.clipboard.writeText(text).then(function() {
        console.log('Async: Copying to clipboard was successful!');
    }, function(err) {
        console.error('Async: Could not copy text: ', err);
    });
}

window.writeClipboardText = function($event, text) {
    $event.target.innerHTML = window.copiedIntlString;

    if (!navigator.clipboard) {
        window.fallbackWriteClipboardText(text);
        return;
    }
    navigator.clipboard.writeText(text).then(function() {
        console.log('Async: Copying to clipboard was successful!');
    }, function(err) {
        console.error('Async: Could not copy text: ', err);
    });
}

window.bitflanToolSearchComponent = function() {
    return {
        tools: [],

        init() {
            this.tools = document.querySelectorAll('[data-tool]');
            this.categories = document.querySelectorAll('[data-category]');

            this.tools.forEach(tool => tool.setAttribute('data-query', tool.dataset.name.toLowerCase().trim().replace(/\s/g, '') + tool.dataset.summary.toLowerCase().trim().replace(/\s/g, '')))

            this.$el.addEventListener('input', () => {
                const query = this.$el.value.trim().toLowerCase().replace(/\s/g, '');

                this.tools.forEach(tool =>
                    !tool.dataset.query.includes(query) ? tool.classList.add('d-none') : tool.classList.remove('d-none')
                );

                this.categories.forEach(category => {
                    if (category.dataset.count == category.querySelectorAll('[data-tool].d-none').length) {
                        category.classList.add('d-none');
                    } else {
                        category.classList.remove('d-none');
                    }
                });
            });
        }
    }
}

window.bitflanToolBaseSearchComponent = function() {
    return {
        query: '',
        list: null,

        init() {
            this.list = this.$refs.list;
            this.$watch('query', () => this.update());
        },

        update() {
            this.list.classList.remove('show');
            let results = 0;

            if(this.query) {
                let search = this.query.toLowerCase().replace(/\s+/g, '');

                for(let i = 0; i < this.list.children.length; i++) {
                    let child = this.list.children[i];

                    child.classList.add('d-none');

                    if(child.dataset.name.toLowerCase().replace(/\s+/g, '').includes(search) || child.dataset.summary.toLowerCase().replace(/\s+/g, '').includes(search)) {
                        child.classList.remove('d-none');
                        results += 1;
                    }
                }
            }

            if(results) {
                this.list.classList.add('show');
            }
        }
    }
}

window.Alpine.start();
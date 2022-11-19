import lodash from 'lodash'
window._ = lodash

import * as Popper from '@popperjs/core'
window.Popper = Popper


import './bootstrap';
import '../sass/app.scss'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'


createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({methods: { route }})
            .mount(el)
    },
});


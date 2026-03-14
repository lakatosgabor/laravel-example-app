import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import '../css/app.css';
import { initializeTheme } from '@/composables/useAppearance';
import { i18n } from './i18n';

import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

import Toast, { type PluginOptions, POSITION } from "vue-toastification";
import "vue-toastification/dist/index.css";
const options: PluginOptions = {
    position: POSITION.TOP_RIGHT,
    timeout: 5000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: false,
    closeButton: "button",
    icon: true,
    rtl: false
};


window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        const initialLocale = (props.initialPage.props.locale as string) || 'hu';
        (i18n.global.locale as any).value = initialLocale;
        document.documentElement.lang = initialLocale;

        router.on('success', (event) => {
            const newLocale = event.detail.page.props.locale as string;
            if (newLocale && i18n.global.locale.value !== newLocale) {
                (i18n.global.locale as any).value = newLocale;
                document.documentElement.lang = newLocale;
            }
        });
        
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .use(Toast, options)
            .component('EasyDataTable', Vue3EasyDataTable)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

initializeTheme();
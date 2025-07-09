import './bootstrap'; // Lëreni këtë rresht, është për Laravel Bootstrap (backend)

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

// Importi i saktë i JavaScript-it të Bootstrap
import 'bootstrap/dist/js/bootstrap.bundle.min.js'; // <= SIGUROHUNI QE ESHTE KY RRESHT

createInertiaApp({
    title: (title) => `${title} - ${import.meta.env.VITE_APP_NAME || 'sportsdiary.com'}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
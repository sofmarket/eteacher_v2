import { ZiggyVue } from 'ziggy-js';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';
import '@/assets/css/main.css';

import { createI18n } from 'vue-i18n';
import ar from "@/lang/ar.json";
import en from "@/lang/en.json";
import fr from "@/lang/fr.json";

const i18n = createI18n({
    legacy: false,
    locale: 'ar',
    fallbackLocale: 'ar',
    messages: {
        ar,
        en,
        fr
    },
});

import('lodash').then(_ => {
    window._ = _;
});

createInertiaApp({
    resolve: name => {

        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });

        const layouts = {
            Layout: () => import('@/Shared/Default/Layout.vue'),
            DashboardLayout: () => import('@/Shared/Dashboard/Layout.vue'),
            AuthLayout: () => import('@/Shared/Auth/Layout.vue'),
            TutorLayout: () => import('@/Shared/Tutor/Layout.vue'),
            StudentLayout: () => import('@/Shared/Student/Layout.vue'),
        };


        let page = pages[`./Pages/${name}.vue`];

        if (!page.layout && name) {
            if (name.startsWith('Dashboard')) {
                return layouts.DashboardLayout().then(layout => {
                    page.default.layout = layout.default || layout;
                    return page;
                });
            } else if (name.startsWith('Auth')) {
                return layouts.AuthLayout().then(layout => {
                    page.default.layout = layout.default || layout;
                    return page;
                });
            } else if (name.startsWith('Tutor')) {
                return layouts.TutorLayout().then(layout => {
                    page.default.layout = layout.default || layout;
                    return page;
                });
            } else if (name.startsWith('Student')) {
                return layouts.StudentLayout().then(layout => {
                    page.default.layout = layout.default || layout;
                    return page;
                });
            } else {
                return layouts.Layout().then(layout => {
                    page.default.layout = layout.default || layout;
                    return page;
                });
            }
        }

        return page;

    },
    setup({ el, App, props, plugin }) {
        // const userInstance = new User(props.initialPage.props.user);
        const app = createApp({ render: () => h(App, props) });
        // app.config.globalProperties.auth = () => userInstance;
        app
            .use(plugin)
            .use(VueSweetalert2)
            .use(ZiggyVue)
            .use(i18n)
            .mount(el);
    },
});

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
// import route from 'ziggy';
// import { ZiggyVue } from 'ziggy'
import '../css/app.css'
// import {  Ziggy } from './ziggy'



createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')

    const page = await pages[`./Pages/${name}.vue`]()
    page.default.layout = page.default.layout || MainLayout 

    return page
  },
  // create  mount and run vue pages
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      // .use(ZiggyVue)
      .mixin({ methods: { route: window.route } })
      .mount(el)
  },
}) 
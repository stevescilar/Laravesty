import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import MainLayout from './Layouts/MainLayout.vue'

createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')

    // specific component view 
    // making sure deault pages are set from main layout
    const page = await pages[`./Pages/${name}.vue`]()
    page.default.layout = page.default.layout || MainLayout 

    return page
  },
  // create  mount and run vue pages
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
}) 
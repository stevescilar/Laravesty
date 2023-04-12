import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')

    // specific component view
    return (await pages[`./Pages/${name}.vue`]())

  },
  // create  mount and run vue pages
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
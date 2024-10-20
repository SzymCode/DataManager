/**
 *  App mount
 */
import { createApp } from 'vue'
export const app = createApp({})

/**
 *  PrimeVue
 */
import 'primevue/resources/themes/lara-light-green/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'

import PrimeVue from 'primevue/config'

app.use(PrimeVue)

/**
 *  Load Primevue components
 */
import { PrimeVueComponents } from '@/constants'
import { globalComponentsRegistry } from '@/utils'

globalComponentsRegistry(PrimeVueComponents, app)

export const parameters = {
  controls: {
    matchers: {
      color: /(background|color)$/i,
      date: /Date$/,
    },
  },
}

/**
 *  Use DataManager's Sass styles
 */
import '../../atomic/bosons/styles/index.scss'
export const tags = ['autodocs'];

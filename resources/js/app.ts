import './bootstrap'
import { createApp } from 'vue'

import 'primeflex/primeflex.css'
import 'primevue/resources/themes/lara-light-green/theme.css'

export const app = createApp({})

/**
 *  PrimeVue components
 */
import Avatar from 'primevue/avatar'
import Button from 'primevue/button'
import Card from 'primevue/card'
import Chart from 'primevue/chart'
import ColorPicker from 'primevue/colorpicker'
import Column from 'primevue/column'
import DataTable from 'primevue/datatable'
import Dialog from 'primevue/dialog'
import Dropdown from 'primevue/dropdown'
import InlineMessage from 'primevue/inlinemessage'
import InputText from 'primevue/inputtext'
import Menu from 'primevue/menu'
import Menubar from 'primevue/menubar'
import PanelMenu from 'primevue/panelmenu'
import Sidebar from 'primevue/sidebar'
import Textarea from 'primevue/textarea'
import Toast from 'primevue/toast'

app.component('Avatar', Avatar)
    .component('Button', Button)
    .component('Card', Card)
    .component('Chart', Chart)
    .component('ColorPicker', ColorPicker)
    .component('Column', Column)
    .component('DataTable', DataTable)
    .component('Dialog', Dialog)
    .component('Dropdown', Dropdown)
    .component('InlineMessage', InlineMessage)
    .component('InputText', InputText)
    .component('Menu', Menu)
    .component('Menubar', Menubar)
    .component('PanelMenu', PanelMenu)
    .component('Sidebar', Sidebar)
    .component('Textarea', Textarea)
    .component('Toast', Toast)

/**
 *  Components
 */
import {
    ActivityLog,
    AdminPanel,
    ArticleDashboard,
    ContactDashboard,
    ColorSettings,
    Home,
    Login,
    MyColorPicker,
    MyLayout,
    Settings,
    Register,
    TestLoginButton,
    Welcome,
    WelcomeNavbar,
} from '@/components'

app.component('activity-log', ActivityLog)
    .component('admin-panel', AdminPanel)
    .component('article-dashboard', ArticleDashboard)
    .component('contact-dashboard', ContactDashboard)
    .component('color-settings', ColorSettings)
    .component('home', Home)
    .component('login', Login)
    .component('my-color-picker', MyColorPicker)
    .component('my-layout', MyLayout)
    .component('settings', Settings)
    .component('register', Register)
    .component('test-login-button', TestLoginButton)
    .component('welcome', Welcome)
    .component('welcome-navbar', WelcomeNavbar)

/**
 *  Directives
 */
import Tooltip from 'primevue/tooltip'

app.directive('tooltip', Tooltip)

/**
 *  App uses & mount
 */
import ToastService from 'primevue/toastservice'
import PrimeVue from 'primevue/config'

app.use(PrimeVue).use(ToastService).mount('#app')

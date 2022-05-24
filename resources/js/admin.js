require('./bootstrap');

import { createApp } from 'vue'
import router from './router'

import App from './components/admin/App'

// SweetAlerts
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import moment from 'moment'

const app = createApp(App)

app.config.globalProperties.$filters = {
    datetime(date) {
        return moment.utc(date).utcOffset(5).format('DD.MM.YYYY H:mm')
    },
}

app.use(router).use(VueSweetalert2).mount('#app')
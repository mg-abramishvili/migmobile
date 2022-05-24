require('./bootstrap');

import { createApp } from 'vue'
import router from './router'

import App from './components/admin/App'

// SweetAlerts
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const app = createApp(App)

app.use(router).use(VueSweetalert2).mount('#app')
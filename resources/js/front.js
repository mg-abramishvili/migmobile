require('./bootstrap');

import { createApp } from 'vue'

import CreateLead from './components/front/CreateLead'
import OrderSimple from './components/front/OrderSimple'
import OrderPretty from './components/front/OrderPretty'

const app = createApp({})

app.component('create-lead', CreateLead)
app.component('order-simple', OrderSimple)
app.component('order-pretty', OrderPretty)

app.mount('#front')
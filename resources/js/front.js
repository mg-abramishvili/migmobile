require('./bootstrap');

import { createApp } from 'vue'

import CreateLead from './components/front/CreateLead'
import OrderSimple from './components/front/OrderSimple'
import OrderPretty from './components/front/OrderPretty'
import Checkout from './components/front/Checkout'
import Tracking from './components/front/Tracking'

const app = createApp({})

app.component('create-lead', CreateLead)
app.component('order-simple', OrderSimple)
app.component('order-pretty', OrderPretty)
app.component('checkout', Checkout)
app.component('tracking', Tracking)

app.mount('#front')
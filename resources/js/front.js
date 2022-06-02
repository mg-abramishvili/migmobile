require('./bootstrap');

import { createApp } from 'vue'

import CreateLead from './components/front/CreateLead'
import OrderNumbers from './components/front/OrderNumbers'

const app = createApp({})

app.component('create-lead', CreateLead)
app.component('order-numbers', OrderNumbers)

app.mount('#front')
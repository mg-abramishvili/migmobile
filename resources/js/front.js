require('./bootstrap');

import { createApp } from 'vue'

import CreateLead from './components/front/CreateLead'

const app = createApp({})

app.component('create-lead', CreateLead)

app.mount('#front')
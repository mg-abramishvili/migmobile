import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home'

import Leads from './components/admin/leads/Index'

import Numbers from './components/admin/numbers/Index'

const routes = [
    {
        path: '/admin',
        name: 'Home',
        component: Home
    },
    {
        path: '/admin/leads',
        name: 'Leads',
        component: Leads
    },
    {
        path: '/admin/numbers',
        name: 'Numbers',
        component: Numbers
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})
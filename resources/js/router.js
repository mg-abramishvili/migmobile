import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home'

import Leads from './components/admin/leads/Index'

import Orders from './components/admin/orders/Index'

import Numbers from './components/admin/numbers/Index'
import NumberCreate from './components/admin/numbers/Create'

import News from './components/admin/news/Index'
import NewsItemEdit from './components/admin/news/Edit'

import Settings from './components/admin/settings/Edit'
import About from './components/admin/about/Edit'

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
        path: '/admin/orders',
        name: 'Orders',
        component: Orders
    },
    {
        path: '/admin/numbers',
        name: 'Numbers',
        component: Numbers
    },
    {
        path: '/admin/numbers/create',
        name: 'NumberCreate',
        component: NumberCreate
    },
    {
        path: '/admin/news',
        name: 'News',
        component: News
    },
    {
        path: '/admin/news-item/:id',
        name: 'NewsItemEdit',
        component: NewsItemEdit
    },
    {
        path: '/admin/settings',
        name: 'Settings',
        component: Settings
    },
    {
        path: '/admin/about',
        name: 'About',
        component: About
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})
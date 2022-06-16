import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home'

import Leads from './components/admin/leads/Index'

import Orders from './components/admin/orders/Index'
import Order from './components/admin/orders/Order'

import Numbers from './components/admin/numbers/Index'
import NumberCreate from './components/admin/numbers/Create'
import NumberImport from './components/admin/numbers/Import'

import Plans from './components/admin/plans/Index'
import PlanEdit from './components/admin/plans/Edit'

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
        path: '/admin/order/:id',
        name: 'Order',
        component: Order
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
        path: '/admin/numbers/import',
        name: 'NumberImport',
        component: NumberImport
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
        path: '/admin/plans',
        name: 'Plans',
        component: Plans
    },
    {
        path: '/admin/plan/:id',
        name: 'PlanEdit',
        component: PlanEdit
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
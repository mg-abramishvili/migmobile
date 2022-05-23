import Vue from 'vue'

Vue.component('create-lead', require('./components/CreateLead.vue').default);

const app = new Vue({
    el: '#front'
});
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import router from './router'

Vue.use(VueRouter);
Vue.use(VueResource);

Vue.component("index", require('./index').default);
Vue.component("menu-item", require('./components/menu-item').default);
Vue.component("product", require('./components/product').default);
Vue.component("products", require('./components/products').default);


const app = new Vue({
    el: '#app',
    router
});

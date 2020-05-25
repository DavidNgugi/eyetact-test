require('./bootstrap');

window.Vue = require('vue');

import store from './store';

Vue.component('product-form', require('./components/ProductForm.vue').default);
Vue.component('product-table', require('./components/ProductTable.vue').default);


const app = new Vue({
    el: '#app',
    store,
});

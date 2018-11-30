
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';

import VueRouter from 'vue-router';
import router from './routes';
import App from './components/Mobile/Common/templet.vue'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import store from './store'
import VueLazyload from 'vue-lazyload'

Vue.use(ElementUI, { locale })
//
Vue.use(VueRouter);
Vue.component('app', App)
Vue.use(VueLazyload, {
    //preLoad: 1.3,
    //error: 'dist/error.png',
    loading:require('./static/images/load.gif'),
     //attempt: 1
  })
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router,
    store
});

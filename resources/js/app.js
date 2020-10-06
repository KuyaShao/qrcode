
require('./bootstrap');

window.Vue = require('vue');

//import
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import router from './router'
import common from "./common";
import store from "./store";



Vue.use(ViewUI);
Vue.mixin(common)
Vue.component('main-app', require('./App.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store
});

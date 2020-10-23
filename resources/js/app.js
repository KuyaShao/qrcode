
require('./bootstrap');

window.Vue = require('vue');

//import
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import router from './router'
import common from "./common";
import store from "./store";



<<<<<<< HEAD

=======
>>>>>>> 6ddf25f4b8cf2afa6052c98bff8b2bccb9276bd1
Vue.use(ViewUI);
Vue.mixin(common)
Vue.component('main-app', require('./App.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store
});

import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from "./auth/Login";
import LoginBusiness from "./bussiness/auth/LoginBusiness"
import RegisterBusiness from "./bussiness/auth/RegisterBusiness";
import Register from "./auth/Register";
import Questionare from "./questionare/Questionare";
import Profile from "./questionare/Profile"
import Home from "./components/Home";
import Scanner from "./components/Scanner";
import Diary from "./components/Diary";
Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component: Login
    },
    {
        path: '/profile',
        component:Profile,
        name:'profile'
    },
    {
        path:'/login',
        component:Login,
        name:'login'
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
        path:'/questionare',
        component:Questionare,
        name:'questionare'
    },
    {
        path:'/qrcode',
        component: Home,
        name:'home'
    },
    {
        path: '/business/login',
        component: LoginBusiness,
        name:'login-business'
    },
    {
        path: '/business/register',
        component: RegisterBusiness,
        name: 'register-business'
    },
    {
        path: '/scanner/:id',
        component: Scanner,
        name: 'scanner'
    },
    {
        path: '/diary',
        component: Diary,
        name: 'diary'
    }

];

export default new VueRouter({
    mode:'history',
    routes
});

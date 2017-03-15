/**
 * Created by jrpikong on 11/03/17.
 */
import VueRouter from 'vue-router';
let routes =[
    {
        path: '/',
        name: 'home',
        component : require('./components/Home')
    },
    {
        path:'/login',
        name:'login',
        component : require('./components/Login')
    },
    {
        path: '/register',
        component : require('./components/Register')
    },
    /*vendor*/
    {
        path:'/vendor/dashboard',
        name:'dashboard',
        meta:{requiresAuth: true},
        component : require('./components/DasboardVendor')
    },
    {
        path:'/vendor/profile',
        name:'profile',
        meta:{requiresAuth: true},
        component : require('./components/ProfileUser')
    },
    {
        path: '*',
        redirect:'/'
    },
    /*End Vendor*/
];

export default new VueRouter({
    mode: 'history',
    hashbang: false,
    linkActiveClass: 'active',
    routes
})
routes.mode = 'html5'


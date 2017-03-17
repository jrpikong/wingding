import router from './routes.js';
import store from './store.js'
require('./bootstrap');

router.beforeEach((to,from,next) => {
    if(to.matched.some(record => record.meta.requiresAuth)){

        const authUser = JSON.parse(window.localStorage.getItem('authUser'))
        if(authUser && authUser.access_token){
            next()
        }else{
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        }
    }
    next()
})
Vue.component('top-menu',require('./components/topMenu.vue'))
const app = new Vue({
    el: '#app',
    router,store
});
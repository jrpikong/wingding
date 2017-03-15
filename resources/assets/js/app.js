import router from './routes.js';
require('./bootstrap');

const app = new Vue({
    el: '#app',
    router,
});


router.beforeEach((to,from,next) => {
    if(to.meta.requiresAuth){
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


import router from './routes.js';
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

const app = new Vue({
    el: '#app',
    router,
});




/**
 * Created by jrpikong on 16/03/17.
 */

import Vue from 'vue'
import Vuex from 'vuex'
import userStore from './components/user/userStore.js'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !=='production'

export default new Vuex.Store({
    module:{
        userStore
    },
    strict: debug
})
/*laravel/resources/assets/js/components/user/*/
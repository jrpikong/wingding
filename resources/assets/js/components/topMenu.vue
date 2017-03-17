<script>
    import {mapState} from 'vuex'
    export default {
        computed: {
            mapState(){
                userStore: state => state.userStore
            }
        },
        created() {
            const userObj = JSON.parse(window.localStorage.getItem('authUser'))
            this.$store.dispatch('setUserObject',userObj)
        }
    }
</script>
<template>
    <div>
        <!--<pre>{{ userStore }}</pre>-->
        <nav class="navbar navbar-default navbar-static-top" >
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/">
                        Laravel
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <!--<ul class="nav navbar-nav navbar-right" v-if="userStore.authUser !== null && userStore.authUser.access_token">-->
                    <ul class="nav navbar-nav navbar-right" v-if="userStore && userStore.authUser && userStore.authUser.access_token">
                        <!-- Authentication Links -->
                        <router-link to="/login" tag="li"><a>Login</a></router-link>
                        <router-link to="/register" tag="li"><a>Register</a></router-link>
                        <router-link to="/vendor/profile" tag="li"><a>Profile</a></router-link>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
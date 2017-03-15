<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" @submit.prevent="login"  ><div :class="{ 'has-error': errors.has('email'), 'form-group': true } ">
                                <label  class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input v-validate data-vv-rules="required|email" v-model="form.email"  type="email" class="form-control" name="email"  required autofocus>
                                    <span v-if="errors.has('email')" class="help-block">
                                        <strong>{{ errors.first('email') }}</strong>
                                        </span>
                                </div>
                            </div>
                                <div :class="{ 'has-error': errors.has('password'), 'form-group': true } ">
                                    <label  class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input v-validate data-vv-rules="required|min:8" v-model="form.password"  type="password" class="form-control" name="password"  required autofocus>
                                        <span v-if="errors.has('password')" class="help-block">
                                            <strong>{{ errors.first('password') }}</strong>
                                            </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input v-model="form.remember" type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                        <a class="btn btn-link" href="">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {clientId,clientSecret,getHeader} from '../env'
    export default{
        data(){
            return{
                form:{
                    email: '',
                    password: '',
                    remember: false
                }
            }
        },
        methods: {
            login () {
                var postData = {
                    client_id:clientId,
                    client_secret:clientSecret,
                    grant_type: 'password',
                    username: this.form.email,
                    password:this.form.password,
                    scope:''
                }
                const authUser ={}
                // Submit the form via a POST request
                axios.post('oauth/token', postData)
                    .then(response =>{
                        if(response.status === 200){
                            authUser.access_token = response.data.access_token
                            authUser.refresh_token = response.data.refresh_token
                            window.localStorage.setItem('authUser', JSON.stringify(authUser))
                            console.log(response.data)
                            axios.get('api/user',{headers:getHeader()})
                                .then(response =>{
                                    authUser.userEmail = response.data.email
                                    authUser.userName  = response.data.name
                                    window.localStorage.setItem('authUser', JSON.stringify(authUser))

                                    if(response.data.role_id === 2)
                                    {
                                        this.$router.push({name:'dashboard'})
                                    }else{
                                        this.$router.push({name:'home'})
                                    }
                                })

                        }
                    })
            }
        }
    }
</script>
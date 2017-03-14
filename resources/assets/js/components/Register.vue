/**
 * Created by jrpikong on 11/03/17.
 */
<template>
    <div style="background: url(http://members.weddingku.com/images/bg-login.jpg) no-repeat; width: 100%; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-7">

                    sini aja
                </div>
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sign In Here</div>
                        <div class="panel-body">
                            <div v-if="validate_responses">
                                <div v-for="validate_response in validate_responses">
                                    <div class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        {{ validate_response }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" @submit.prevent="signup"  >
                                <div :class="{ 'has-error': errors.has('name'), 'form-group': true } ">
                                    <div class="col-md-12">
                                        <input v-validate
                                               data-vv-rules="required"
                                               v-model="form.name"
                                               type="text"
                                               class="form-control"
                                               name="name"
                                               placeholder="Full Name"
                                               required autofocus>
                                        <span v-if="errors.has('name')" class="help-block">
                                            <strong>{{ errors.first('name') }}</strong>
                                            </span>
                                    </div>
                                </div>
                                <div :class="{ 'has-error': errors.has('email'), 'form-group': true } ">
                                    <div class="col-md-12">
                                        <input v-validate
                                               data-vv-rules="required|email"
                                               v-model="form.email"  t
                                               type="email"
                                               class="form-control"
                                               name="email"
                                               placeholder="E-Mail Address"
                                               required autofocus>
                                        <span v-if="errors.has('email')" class="help-block">
                                            <strong>{{ errors.first('email') }}</strong>
                                            </span>
                                    </div>
                                </div>
                                <div :class="{ 'has-error': errors.has('password'), 'form-group': true } ">
                                    <div class="col-md-12">
                                        <input v-validate
                                               data-vv-rules="required|min:8"
                                               v-model="form.password"
                                               type="password"
                                               class="form-control"
                                               name="password"
                                               placeholder="Password"
                                               required autofocus>
                                        <span v-if="errors.has('password')" class="help-block">
                                            <strong>{{ errors.first('password') }}</strong>
                                            </span>
                                    </div>
                                </div>
                                <div :class="{ 'has-error': errors.has('retypepassword'), 'form-group': true } ">
                                    <div class="col-md-12">
                                        <input v-validate
                                               data-vv-rules="required|min:8|confirmed:password"
                                               v-model="form.retypepassword"
                                               type="password"
                                               class="form-control"
                                               name="retypepassword"
                                               placeholder="Retype Password"
                                               required autofocus>
                                        <span v-if="errors.has('retypepassword')" class="help-block">
                                            <strong>{{ errors.first('retypepassword') }}</strong>
                                            </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Sign Now
                                        </button>
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
    export default{
        data(){
            return{
                validate_responses:'',
                form:{
                    email           : '',
                    password        : '',
                    retypepassword  :'',
                    name            :''
                }
            }
        },
        methods: {
            signup () {
                var data = {
                    name:this.form.name,
                    email: this.form.email,
                    password:this.form.password,
                }
                // Submit the form via a POST request
                axios.post('api/auth/register', data)
                        .then(response => {
                            this.$router.push('/')
                        })
                        .catch(error =>{
                            this.validate_responses = error.response.data;
                        })
            }
        }
    }
</script>
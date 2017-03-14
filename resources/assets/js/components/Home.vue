<template>
    <div class="container">
        <div class="row">
            <!--<pulse-loader :loading="PulseLoader.loading" :color="PulseLoader.color" :size="PulseLoader.size" v-if="loading"></pulse-loader>-->
            <div class="panel panel-default" v-for="user in users">
                <div class="panel-heading">{{ user.name }} - {{ user.email}}</div>
                <div class="panel-body">{{ user.registered }}</div>
            </div>
        </div>
    </div>
</template>

<script>
//    var PulseLoader = VueSpinner.PulseLoader
//var PulseLoader = VueStrap.PulseLoader;
    export default{
        data(){
            return{
                users:[],
                loading:false,
                PulseLoader:{
                    color: '#3AB982',
                    height: '35px',
                    width: '4px',
                    margin: '2px',
                    radius: '2px'
                }
            }
        },
        mounted() {
            this.loading =true;
            axios.get('api/user').then((response) => {this.users = response.data.data;this.loading=false});
        }
    }
</script>
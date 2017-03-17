<template>
    <div class="container">
        <div class="row">
            <div class="panel panel-default" v-for="user in users">
                <div class="panel-heading">{{ user.name }} - {{ user.email}}</div>
                <div class="panel-body">{{ user.registered }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import {getHeader} from '../env'
    export default{
        data(){
            return{
                users:[]
            }
        },
        mounted() {
            axios.get('api/get-all-user',{headers : getHeader()}).then((response) => {this.users = response.data.data;});
        }
    }
</script>
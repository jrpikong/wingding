<template>
    <div class="container">
        <div class="row">
            <div v-if="Loading">Loading</div>
            <div class="panel panel-default" v-for="user in users">
                <div class="panel-heading">{{user.name}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                users:[],
                Loading:false
            }
        },
        mounted(){
            this.Loading = true;
            axios.get('api/user').then((response)=>{this.users=response.data; this.Loading=false});

        }
    }
</script>
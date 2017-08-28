
<template>
<div class="pull-right">
                   <p v-show="loading">
                       Loading ...
                       </p>     

                       <div v-if="!loading">
                           <button class="btn btn-primary" v-if="status == 0" @click="add_friend">Add Friend</button>
                           <button class="btn btn-primary" v-if="status == 'pending'" @click="accept_friend">Accept Friend</button>
                           <span class="btn btn-success" v-if="status == 'waiting'">Waiting For Response</span>
                        <!-- Single button -->
                        <div class="btn-group">
                        <button type="button" v-if="status == 'friends'" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Friends <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a @click="unfriend">Unfriend</a></li>
                        </ul>
                        </div>
                       </div>

     </div>       
        
</template>
<script>
    export default{
       mounted() {
            axios.get("/check/"+this.profile_user_id).then((res)=>{
                this.status = res.data.status;
                this.loading = false;
            })
            },
        props:['profile_user_id'],
        data(){
            return {
                status:'',
                loading:true
            }
        },
        methods:{
            add_friend(){
                this.loading = true;
                axios.get("/add_friend/"+this.profile_user_id).then((resp) =>{
                    this.status = "waiting";
                    this.loading = false;
                });
            },
            accept_friend(){
                this.loading = true;
                axios.get("/accept_friend/"+this.profile_user_id).then((resp)=>{
                    this.status = "friends";
                    this.loading = false;
                });
            },
            unfriend(){
                this.loading = true;
                axios.get("/unfriend/"+this.profile_user_id).then((resp)=>{
                    this.status = 0;
                    this.loading = false;
                })
            }
        }
    }
</script>
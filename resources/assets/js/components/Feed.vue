<template>

<div class="container">
<br />
    <div class="row">
    
        <div :class="{'col-lg-9':this.giveprofile}">
        <div class="" v-for="post in posts">
            <div class="panel panel-primary" style="border-radius:0">
                <div class="panel-heading">
                    <span v-if="post.shared == true">{{post.user_shared}} shared this post</span>
                    By {{post.user.name}}

    <div v-if="post.user_id == auth_user_id.auth_user.id" class="dropdown pull-right">
            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"  id="postActions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></span>

 
    <ul class="dropdown-menu" aria-labelledby="postActions">
        <li><a @click="delete_post(post)">Delete</a></li>
    </ul>
        </div>

                            <small v-if="post.status != null">Feel Like {{post.status.status}}</small>  
                    
                </div>
                <div class="panel-body">{{post.body}}
<br /><br />
<span> {{post.created_at}} </span>

 <hr style="margin-top: 0px; " />

            <like :if_profile="ifprofile" style="height: 0px; position:relative" :id="post.id"></like>
         <button class="btn btn-info btn-xs pull-left" style="margin-left:5px" @click="share_post(post)">Share</button>

    <comment  :id="post.id" :if_profile="ifprofile"></comment>

                </div>
               </div>
            </div>
        </div>



        
    </div>
    
    </div>  
</template>

<script>
import Like from "./Like.vue";
import Comment from "./Comment.vue";
export default {
    mounted(){
        this.get_feed()
        this.profile_posts()
    
    },
  
    data(){
        return {
            ifprofile:'',
        auth_user_id:this.$store.state
                                      }
    },
    components:{
        Like,Comment
    },
    props:['giveprofile','profile_id'],
  
  methods:{
      get_feed(){
          axios.get("/feed").then((resp)=>{
              resp.data.forEach((data)=>{
                this.$store.commit("add_post",data);         
                                
            })
      });
      
  },
  profile_posts(){
      axios.get("/profile_posts/"+this.profile_id).then((resp)=>{
          resp.data.forEach((data)=>{
            this.$store.commit("add_profile_posts",data);
            
          })
      })
  },
  delete_post(post){
    axios.get("/delete_post/"+post.id).then((resp)=>{
        this.$store.commit("delete_post",{
            post_id:post.id,
            ifprofile:this.giveprofile
        });
    
new Noty({
                    'text':"post deleted !",
                    'type':"error",
                    'layout':"bottomLeft"
            }).show()

    })
  },
  share_post(post){
      axios.get("/share/"+post.id).then((resp)=>{
          console.log(resp.data);
          this.$store.commit("add_profile_posts",resp.data)
      new Noty({
                    'text':"share succuss!",
                    'type':"success",
                    'layout':"bottomLeft"
            }).show()

      })
        }

},
computed:{
    
   posts(){
    if(this.giveprofile === true){
         this.ifprofile = true;
        return this.$store.getters.all_profile_posts;
       
   }else{
        return this.$store.getters.all_posts;
    } 
    }
}
}
</script>


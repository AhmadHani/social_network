                <template>
                <div >
                    
                   
                <button class="btn btn-success btn-xs" style="margin-left:5px" @click="showcomment = true">Comment</button>
                    <div v-if="showcomment == true">
                    <hr style="margin-bottom:0px" />
                     <span >

                        {{count_comments}} Comments
                </span>
                    <hr style="margin-top:0px;" />
                    
                <div v-if="show==true"   v-for="commentt in last_comments">
                            <img :src='commentt.user.avatar' width="30px" height="30px" />       {{commentt.comment}}
                                    <div v-if="commentt.user_id == auth_user_id" class="btn-group pull-right">
                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a @click="show_comment_box(commentt)">Edit</a></li>
                                <li><a @click="delete_comment(commentt)">Delete</a></li>
                            </ul>
                            </div>
                    <hr />
                        </div>
                    
                <div v-if="show==false"   v-for="comment in post.comments">
                            <img :src='comment.user.avatar' width="30px" height="30px" />       {{comment.comment}}
                        
                        <div v-if="comment.user_id == auth_user_id" class="btn-group pull-right">
                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a @click="show_comment_box(comment)">Edit</a></li>
                                <li><a @click="delete_comment(comment)">Delete</a></li>
                            </ul>
                            </div>
                    <hr />

                        </div>
                        <center><button class="btn btn-success btn-xs" v-if="count_comments > 0 && show == true" @click="show = false">Show All Comments</button></center>

                        <center><button class="btn btn-success btn-xs" v-if="count_comments > 0&&show == false" @click="show = true">Show Less Comments</button></center>
                <br />
                    <img :src="this.$store.state.auth_user.avatar" width="30px" height="30px" />

                    <input style="width:95%" v-model="content"  type="text" class="form-control col-lg-10 pull-right" v-if="show_c_b" @keyup.enter="edit_comment" name="comment" placeholder="write comment" />
                
                    <input style="width:95%" v-model="content"  type="text" class="form-control col-lg-10 pull-right" v-else @keyup.enter="add_comment" name="comment" placeholder="write comment" />
                
                </div>
                </div>
                </template>
                <script>
                export default {
                    props:['id',"if_profile"],
                    mounted(){
                        
                    },
                    data(){
                        return {
                            content:"",
                            show:true,
                            ifprofile:this.if_profile,
                            showcomment:false,
                            show_c_b:false,
                            comment_data:'',
                            auth_user_id:this.$store.state.auth_user.id
                            }
                    },    
                    methods:{
                    add_comment(){
                        axios.post("/add_comment",{content:this.content,post_id:this.id}).then((resp)=>{
                            
                            this.content = '';
                this.$store.commit("add_comment",{
                    post_id:this.id,
                    comment:resp.data
                ,
                ifprofile:this.ifprofile
                });
                new Noty({
                                    'text':"comment published !",
                                    'type':"success",
                                    'layout':"bottomLeft"
                            }).show()


                        })
                    },
                    delete_comment(comment){
                        if(comment.user_id == this.auth_user_id){
                        axios.get("/delete_comment/"+comment.id).then((resp)=>{
                            this.$store.commit("delete_comment",{
                                comment_id:comment.id,
                                post_id:this.id,
                                ifprofile:this.ifprofile
                            });
                        
                new Noty({
                                    'text':"comment deleted !",
                                    'type':"error",
                                    'layout':"bottomLeft"
                            }).show()
                
                        })
                        }else{
                    
                new Noty({
                                    'text':"you can't delete this comment !",
                                    'type':"error",
                                    'layout':"bottomLeft"
                            }).show()
                        
                        }
                    },
                    show_comment_box(comment){
                            if(comment.user_id == this.auth_user_id){
                            this.content = comment.comment;
                            this.show_c_b = true;
                            this.comment_data = comment;
                            }else{
                                new Noty({
                                    'text':"you can't edit this comment",
                                    'layout':"bottomLeft",
                                    'type':"error"
                                })
                            }
                        
                },
                edit_comment(){
                    
                    axios.post("/edit_comment/"+this.comment_data.id,{comment:this.content}).then((resp)=>{
                        this.$store.commit("edit_comment",{
                            post_id:this.id,
                            comment_data:this.comment_data,
                            comment:this.content,
                            ifprofile:this.ifprofile
                        })
                        this.content = "";
                        this.show_c_b = false;
                        
                new Noty({
                                    'text':"comment updated !",
                                    'type':"success",
                                    'layout':"bottomLeft"
                            }).show()
                        
                    })
                    
                    
                    }
                    //count_comments(){
                        //axios.get("/count_comments/"+this.id).then((resp)=>{
                        //this.count = resp.data;
                    //  })
                    //}
                    
                    },
                    computed:{
                    count_comments(){
                        var comments_arr  = [];
                        this.post.comments.forEach((resp)=>{
                            comments_arr.push(resp.id);
                        })
                return comments_arr.length;

                    }, 
                        last_comments(){
                        
                        var comments_arr2  = [];
                        this.post.comments.forEach((resp)=>{
                            comments_arr2.push(resp);
                        })
                        return comments_arr2.slice(Math.max(comments_arr2.length - 3, 0))
                ;
                        },
                    post(){
                        if(this.ifprofile === true){
                return this.$store.state.profile_posts.find((resp)=>{
                            return resp.id === this.id;
                        })
                        }else{
                        return this.$store.state.posts.find((resp)=>{
                            return resp.id === this.id;
                        })
                        }
                    }
                    }
                }

                </script>

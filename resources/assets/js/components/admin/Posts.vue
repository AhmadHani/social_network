<template>
  
      <section id="main-content">
          <section class="wrapper">
           <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-newspaper-o"></i> Posts</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-newspaper-o"></i>Posts</li>
					</ol>
				</div>
			</div>
         
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Posts
                                   <a class="btn btn-success btn-xs" href="/admin/add/post"><i class="fa fa-plus"></i></a>

                          </header>
                                      
                          <table class="table table-striped table-advance table-hover">

                           <tbody>
                              <tr>
                              <th><i class="fa fa-file-image-o"></i> Avatar</th>
                        <th><i class="icon_profile"></i>Name</th>

                                 <th><i class="fa fa-newspaper-o"></i> Post</th>
                                 <th><i class="fa fa-comment-o"></i> Comments</th>
                                 <th><i class="fa fa-venus-mars"></i> Likes</th>
                                 <th><i class="icon_calendar"></i> Shares</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              
                              <tr v-for="posts in all_posts">
                                <td><img :src="posts.user.avatar" with="50px" height="50px" /></td>
                                 <td>{{posts.user.name}}</td>
                                 <td>{{posts.body.substring(0,20)}}</td>
                                 <td>{{posts.comments.length}}</td>
                                 <td>{{posts.likes.length}}</td>
                                 <td>{{posts.shares.length}}</td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" :href="'/admin/edit/post/'+posts.id" ><i class="fa fa-pencil-square-o"></i></a>
                                      <a class="btn btn-success" href="/admin/add/post"><i class="fa fa-plus"></i></a>
                                      <a class="btn btn-danger" @click="delete_post(posts)"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
              </section>
              <!-- start -->
              

              </section>
             </template>

<script>
export default {
    mounted(){
        this.get_posts()
    },
    data(){
        return {
            show_modal:false
        }
    },
    methods:{
    get_posts(){
    axios.get("/admin/get_posts").then((resp)=>{
            resp.data.forEach((data)=>{
        this.$store.commit("get_posts",data);
            })
             
        })
    },
    delete_post(post){
        axios.get("/admin/delete_post/"+post.id).then((resp)=>{
            this.$store.commit("delete_post",post);
                new Noty({
            text:"Deleted successfully",
            layout:"bottomLeft",
            type:"success"
            }).show()
        
        })
    }
    },
    computed:{
        all_posts(){
            return this.$store.getters.all_posts_admin;
        
        }
    }
}

</script>

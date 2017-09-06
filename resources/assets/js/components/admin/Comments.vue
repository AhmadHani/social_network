<template>
  
      <section id="main-content">
          <section class="wrapper">
           <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-newspaper-o"></i> Comments</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-comment-o"></i>Comments</li>
					</ol>
				</div>
			</div>
         
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Posts
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                              <th><i class="fa fa-file-image-o"></i> Avatar</th>
                        <th><i class="icon_profile"></i>Name</th>

                                 <th><i class="fa fa-comment-o"></i> Comment</th>
                                 <th><i class="fa fa-newspaper-o"></i> Post</th>
                                 <th><i class="fa fa-user-o"></i> Comment by</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              
                              <tr v-for="comments in all_comments">
                                <td><img :src="comments.user.avatar" with="50px" height="50px" /></td>
                                 <td>{{comments.user.name}}</td>
                                 <td>{{comments.comment.substring(0,20)}}</td>
                                 <td>{{comments.post.body}}</td>
                                 <td>{{comments.post.user.name}}</td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" :href="'/admin/edit/comment/'+comments.id"><i class="fa fa-pencil-square-o"></i></a>
                                      <a class="btn btn-danger" @click="delete_comment(comments)"><i class="icon_close_alt2"></i></a>
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
        this.get_comments()
    },
    data(){
        return {
            show_modal:false
        }
    },
    methods:{
    get_comments(){
    axios.get("/admin/get_comments").then((resp)=>{
            resp.data.forEach((data)=>{
        this.$store.commit("get_comments",data);
            })
             
        })
    },
    delete_comment(comment){
        axios.get("/admin/delete_comment/"+comment.id).then((resp)=>{
            this.$store.commit("delete_comment2",comment);
                new Noty({
            text:"Deleted successfully",
            layout:"bottomLeft",
            type:"success"
            }).show()
        
        })
    }
    },
    computed:{
        all_comments(){
            return this.$store.getters.all_comments;
        
        }
    }
}

</script>

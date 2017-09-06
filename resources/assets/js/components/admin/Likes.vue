<template>
  
      <section id="main-content">
          <section class="wrapper">
           <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-newspaper-o"></i> Likes</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-thumbs-up"></i>Likes</li>
					</ol>
				</div>
			</div>
         
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Likes
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                              <th><i class="fa fa-file-image-o"></i> Avatar</th>
                        <th><i class="icon_profile"></i>Name</th>
                                 <th><i class="fa fa-newspaper-o"></i> Post</th>

                                 <th><i class="fa fa-user-o"></i> Post by</th>
                                 
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              
                              <tr v-for="likes in all_likes">
                                <td><img :src="likes.user.avatar" with="50px" height="50px" /></td>
                                 <td>{{likes.user.name}}</td>
                                 <td>{{likes.post.body.substring(0,20)}}</td>
                                 <td>{{likes.post.user.name}}</td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-danger" @click="delete_like(likes)"><i class="icon_close_alt2"></i></a>
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
        this.get_likes()
    },
    data(){
        return {
            show_modal:false
        }
    },
    methods:{
    get_likes(){
    axios.get("/admin/get_likes").then((resp)=>{
            resp.data.forEach((data)=>{
        this.$store.commit("get_likes",data);
            })
             
        })
    },
    delete_like(like){
        axios.get("/admin/delete_like/"+like.id).then((resp)=>{
            this.$store.commit("delete_like2",like);
                new Noty({
            text:"Deleted successfully",
            layout:"bottomLeft",
            type:"success"
            }).show()
        
        })
    }
    },
    computed:{
        all_likes(){
            return this.$store.getters.all_likes;
        
        }
    }
}

</script>

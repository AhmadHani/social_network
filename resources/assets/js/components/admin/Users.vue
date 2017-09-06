            <template>
            
                <section id="main-content">
                    <section class="wrapper">
                    <div class="row">
                            <div class="col-lg-12">
                                <h3 class="page-header"><i class="fa fa-user-o"></i> Users</h3>
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                    <li><i class="fa fa-user-o"></i>Users</li>
                                </ol>
                            </div>
                        </div>
                    
            <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        All Users
                                        
                                   <a class="btn btn-success btn-xs" href="/admin/add/user"><i class="fa fa-plus"></i></a>

                                    </header>
                                    
                                    <table class="table table-striped table-advance table-hover">
                                    <tbody>
                                        <tr>
                                        <th><i class="fa fa-file-image-o"></i> Avatar</th>
                                    <th><i class="icon_profile"></i>Name</th>

                                            <th><i class="icon_profile"></i> Username</th>
                                            <th><i class="icon_mail_alt"></i> Email</th>
                                            <th><i class="fa fa-venus-mars"></i> Gender</th>
                                            <th><i class="icon_calendar"></i> Date of birth</th>
                                            <th><i class="icon_pin_alt"></i> Location</th>
                                            <th><i class=""></i>Access</th>
                                            <th><i class="fa fa-info"></i> About</th>
                                            <th><i class="icon_cogs"></i> Action</th>
                                        </tr>
                                        
                                        <tr v-for="users in all_users">
                                            <td><img :src="users.avatar" with="50px" height="50px" /></td>
                                            <td>{{users.name}}</td>
                                            <td>{{users.username}}</td>
                                            <td>{{users.email}}</td>
                                            <td>{{users.gender == 0 ? "Male" : "Female"}}</td>
                                            <td>{{users.profile.date_birth != null ? users.profile.date_birth : 'NULL'}}</td>
                                            <td>{{users.profile.location != null ? users.profile.location : 'NULL'}}</td>
                                            <td>{{users.access == 0 ? "User" : "Admin"}}</td>
                                            <td>{{users.profile.about != null ? users.profile.about.substring(0,15)+'....' : 'NULL'}}</td>

                                            <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" :href="'/admin/edit/user/'+users.id" ><i class="fa fa-pencil-square-o"></i></a>
                                                <a class="btn btn-success" href="/admin/add/user"><i class="fa fa-plus"></i></a>
                                                <a class="btn btn-danger" href="#" @click="delete_user(users)"><i class="icon_close_alt2"></i></a>
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
                

            <!-- end -->

                        </section>
                        </template>

            <script>
            export default {
                mounted(){
                    this.get_users()
                },
                data(){
                    return {
                        show_modal:false
                    }
                },
                methods:{
                get_users(){
                axios.get("/admin/get_users").then((resp)=>{
                        resp.data.forEach((data)=>{
                    this.$store.commit("add_user",data);
                        })
                        
                    })
                },
                delete_user(user){
                    axios.get("/admin/delete_user/"+user.id).then((resp)=>{
                        this.$store.commit("delete_user",user);
                        new Noty({
                        text:"Deleted successfully",
                        layout:"bottomLeft",
                        type:"success"
                        }).show()
                    
                    })
                }
                },
                computed:{
                    all_users(){
                        return this.$store.getters.all_users;
                    }
                }
            }

            </script>

        import Vuex from "vuex";
        import Vue from "vue";


        Vue.use(Vuex)


        export const store = new Vuex.Store({
  
                state:{
                    nots:[],
                    posts:[],
                    auth_user:{},
                    profile_posts:[],
                    users_admin:[],
                    posts_admin:[],
                    comments:[],
                    likes:[]
                        
                },
                getters:{
                    all_nots(state){
                        return state.nots;
                    },
                    all_nots_count(state){
                    return state.nots.length;
                            
                    },
                    all_posts(state){
                        return state.posts;
                    },
                        all_profile_posts(state){
                                return state.profile_posts;
                        },
                            all_users(state){
                                return state.users_admin;
                            },
                            all_posts_admin(state){
                                return state.posts_admin;
                            },
                            all_comments(state){
                                return state.comments;
                            },
                            all_likes(state){
                                return state.likes;
                            }
                },
                mutations:{
                    add_not(state,not){
                        state.nots.push(not);
                    },
                    add_post(state,post){
                        state.posts.push(post);
                    },
                    auth_user_data(state,auth){
                            state.auth_user = auth;
                    },
                    update_like(state,payload){
                        if(payload.ifprofile == true){

                        var profile_posts = state.profile_posts.find((post)=>{
                            return post.id === payload.post_id
                        })
                                        profile_posts.likes.push(payload.like);

                        }else{
                        var post = state.posts.find((post)=>{
                            return post.id === payload.post_id
                        })
                        
                        post.likes.push(payload.like);

                        }
                    },
                    delete_like(state,payload){
        if(payload.ifprofile != true){
                        var post = state.posts.find((post)=>{
                            return post.id === payload.post_id
                        })
                        var like = post.likes.find((like)=>{
                            return like.id = payload.like_id
                        })
                        var index = post.likes.indexOf(like);
                        post.likes.splice(index,1);
        }else{
                        var profile_posts = state.profile_posts.find((post)=>{
                            return post.id === payload.post_id
                        })
                        var profile_like = profile_posts.likes.find((like)=>{
                            return like.id = payload.like_id
                        })
                        var index2 = profile_posts.likes.indexOf(profile_like);
                        profile_posts.likes.splice(index2,1);
        }
                    },
                        add_comment(state,payload){
                            if(payload.ifprofile != true){
                        var post =  state.posts.find((resp)=>{
                                return resp.id === payload.post_id
                            })
                                                post.comments.push(payload.comment);

                            }else{
                            var profile_posts =  state.profile_posts.find((resp)=>{
                                return resp.id === payload.post_id
                            })
                                                profile_posts.comments.push(payload.comment);

                            }
                        },
                        add_profile_posts(state,posts){
                            state.profile_posts.push(posts)

                        },
                        delete_comment(state,payload){
                            if(payload.ifprofile != true){
                            var post = state.posts.find((resp)=>{
                                return resp.id == payload.post_id;
                            })
                            var comment = post.comments.find((comment)=>{
                                return comment.id == payload.comment_id
                            })
                            var index = post.comments.indexOf(comment);
                            post.comments.splice(index,1);
                            }else{
                                
                            var profile_post = state.profile_posts.find((resp)=>{
                                return resp.id == payload.post_id;
                            })
                            var profile_comment = profile_post.comments.find((comment)=>{
                                return comment.id == payload.comment_id
                            })
                            var index2 = profile_post.comments.indexOf(profile_comment);
                            profile_post.comments.splice(index2,1);
                            }
                        },
                        edit_comment(state,payload){
                            if(payload.ifprofile != true){
                            var post = state.posts.find((resp)=>{
                                return resp.id == payload.post_id
                            })
                            var comment = post.comments.find((comment)=>{
                                return comment.id == payload.comment_data.id
                            })
                            comment.comment = payload.comment
                            }
                        else{
                                    var post = state.profile_posts.find((resp)=>{
                                return resp.id == payload.post_id
                            })
                            var comment = post.comments.find((comment)=>{
                                return comment.id == payload.comment_data.id
                            })
                            comment.comment = payload.comment

                        }

                        },
                    delete_post(state,payload){
                        
                        if(payload.ifprofile == true){
                        var post = state.profile_posts.find((resp)=>{
                            return resp.id == payload.post_id
                        }) 
                        var index = state.profile_posts.indexOf(post)
                        state.profile_posts.splice(index,1);
       
                        }else{

                        
                        var post = state.posts.find((resp)=>{
                            return resp.id == payload.post_id
                        }) 
                        var index = state.posts.indexOf(post)
                        state.posts.splice(index,1);
                    }
                    },
                add_user(state,user){
                    state.users_admin.push(user);
                },
                delete_user(state,user){
                    var user = state.users_admin.find((resp)=>{
                        return resp.id == user.id;
                    })
                    var index = state.users_admin.indexOf(user);
                state.users_admin.splice(index,1);
                },
            get_posts(state,post){
                state.posts_admin.push(post);
            },
            delete_post(state,post){
                var post = state.posts_admin.find((resp)=>{
                    return resp.id == post.id;
                })
                var index = state.posts_admin.indexOf(post);
                state.posts_admin.splice(index,1);
            },
            get_comments(state,comment){
                state.comments.push(comment);
            },
            delete_comment2(state,comment){
                var comment = state.comments.find((resp)=>{
                    return resp.id == comment.id
                })
                var index = state.comments.indexOf(comment);
                state.comments.splice(index,1);
            },
            get_likes(state,like){
                state.likes.push(like)
            },
            delete_like2(state,like){
                var like = state.likes.find((resp)=>{
                    resp.id == like.id
                })
                var index = state.likes.indexOf(like);
                state.likes.splice(index,1);
            }
                }

        });

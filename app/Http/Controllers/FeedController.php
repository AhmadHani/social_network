<?php

namespace App\Http\Controllers;
use App\User;
use App\Share;
use Illuminate\Http\Request;
use Auth;
use App\Post;
class FeedController extends Controller
{
    public function feed(){
        $friends = Auth::user()->friends();

        $feed = [];

        foreach($friends as $friend){
            foreach($friend->posts as $post){
                array_push($feed,$post);
            }
        }
        foreach(Auth::user()->posts as $posts){
            array_push($feed,$posts);
        }
        usort($feed,function($f1,$f2){
            return $f1->id < $f2->id;
        });
        return $feed;
    }
    public function profile_posts($id){
 $p_posts = [];
 $user_posts = User::find($id)->posts;
 $user_posts->load("shares");
        foreach($user_posts as $posts){
            array_push($p_posts,$posts);
        }
        $shares = Share::where("user_id",$id)->get();
 $shares->load("post");
 
        foreach($shares as $share){       
   $share->post->setAttribute('shared',true);
   $share->post->setAttribute('user_shared',User::find($id)->name);

            array_push($p_posts,$share->post);
        }
        
        return $p_posts;
    }
    public function delete_post($id){
        
        $post = Post::find($id);
        if($post->user_id == Auth::id()){
          if($post != null){
            if($post->comments != null) $post->comments()->forceDelete(); else  return null;
            if($post->likes != null)  $post->likes()->forceDelete(); else return null;
            
            $post->delete();
            

        }else{
        return Session::flash("error","we can't find this post");
        }
        }else{
return Session::flash("error","you can't delete this post");  
      }
    }
}

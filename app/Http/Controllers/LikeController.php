<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Post;
use App\Like;
use Notification;
use App\Notifications\LikePost;
class LikeController extends Controller
{
    public function like($id){
        $post = Post::find($id);
        $like = Like::create([
            'user_id'=>Auth::id(),
            'post_id'=>$post->id
        ]);
        if($like->post->user_id != Auth::id()){
            Notification::send(User::find($like->post->user_id),new LikePost(Auth::user()));
        }
        return Like::find($like->id);
    }
    public function unlike($id){
        $like = Like::where("post_id",$id)->where("user_id",Auth::id())->first();
        if($like){
            $like->delete();
            return $like->id;
        }else{
            return Session::flash("error","you can't unlike this post");
        }
    }
    public function count($id){
        $likes = Like::where("post_id",$id)->get();
        return count($likes);
    }
}

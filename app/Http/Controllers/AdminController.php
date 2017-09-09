<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Post;
use App\Like;
use App\Profile;
use Auth;
class AdminController extends Controller
{
    public function index(){
    $users = User::all();
    $count = [];
    foreach($users as $user){
        $count[0] = $user->count();
        
        $count[1] = $user->posts->count();
    $count[2] = $user->comments->count();
    $count[3] = $user->likes->count();
            return view("admin.index")->withCount($count);

    }
    
    
    }
    public function get_users(){
        $users = User::all();
    return $users;
    }
    public function delete_user($id){
        $user = User::find($id);
        if($user){
            $user->delete();
        }
    }
    public function get_posts(){
        $posts = Post::all();
        return $posts;
    }
    public function delete_post($id){
        $post = Post::find($id);
        if($post){
            $post->delete();
        $post->comments != null ? $post->comments()->forceDelete() : 0;
        $post->likes != null ? $post->likes()->forceDelete() : 0;
        $post->shares != null ? $post->shares()->forceDelete() : 0;
        }
        
        
    }
    public function get_comments(){
        $comments = Comment::all()->load("post");
        return $comments;
    }
    public function delete_comment($id){
        $comment = Comment::find($id);
        if($comment){
            $comment->delete();
        }
    }

    public function get_likes(){
        $likes = Like::all()->load("post");
        return $likes;
    }

    public function update_settings(Request $request){
        $settings = Setting::find(1);
        $settings->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'description'=>$request->description,
            'keys'=>$request->keys,
            'status'=>$request->status
        ]);
        return redirect()->back();
    }
    public function delete_like($id){
        $like = Like::find($id);
        if($like){
            $like->delete();
        }
    }
    public function users(){
                return view("admin.users");

    }
    public function settings(){
        $settings = Setting::find(1);
        return view("admin.settings")->withSettings($settings);
    }
    public function posts(){
        return view("admin.posts");
    }
    public function comments(){
        return view("admin.comments");
    }

    public function likes(){
        return view("admin.likes");
    }
    public function edit($type,$id){
        if($type == "post"){
            $post = Post::find($id);
            return view("admin.edit")->withPost($post)->withType("Post");
        }
        if($type == "comment"){
            $comment = Comment::find($id);
            return view("admin.edit")->withType("Comment")->withComment($comment);
        }
        if($type== "user"){
            $user = User::find($id);
            return view("admin.edit")->withUser($user)->withType("User");
        }
    }

    public function update($type,$id,Request $request){
        if($type == "post"){
            $post = Post::find($id);
            $this->validate($request,[
            'body'=>"required"
         ]);
            $post->update([
                'body'=>$request->body
            ]);
            return redirect()->route("posts");
        
        }
        if($type == "comment"){
         $this->validate($request,[
            'comment'=>"required|max:300"
         ]);
                $comment = Comment::find($id);
         
            $comment->update([
                'comment'=>$request->comment
            ]);
            return redirect()->route("comments");
        
        }
        if($type== "user"){
           
            $this->validate($request, [
           
            'gender'=>"required|bool",
        ]);
            $user = User::find($id);
           
    if(!empty($request->password)){
        $this->validate($request,[
             'password' => 'required|string|min:6|confirmed',
        ]);
    }
            if($request->email != $user->email){
                $this->validate($request,[
                          'email' => 'required|string|email|max:255|unique:users',

                ]);
            }else if($request->name != $user->name){
                $this->validate($request,[
            'name' => 'required|string|max:255',

                ]);
            }else if($request->username != $user->username){
                $this->validate($request,[
            'username'=>"required|min:3|max:27|unique:users"

                ]);
            }
            $user->update([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'gender'=>$request->gender,
                
                'access'=>$request->access

            ]);
            if(!empty($request->password)){

            $user->update([
                'password'=>bcrybt($request->password)

            ]);
            }
            if($request->hasFile("avatar")){
            $user->update([
                'avatar'=>$request->avatar->store('/public/avatars')
            ]);
            }
            $user->profile->update([
                'about'=>$request->about,
                'location'=>$request->location,
                'data_birth'=>$request->data_birth
            ]);
            return redirect()->route('users');
        
        }
    }
    public function add($type){
        if($type == "user"){
            return view("admin.add")->withType('user');
        }
         if($type == "post"){
            return view("admin.add")->withType("post");
        }
        
    }
    public function store($type,Request $request){
        if($type == "user"){

            $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender'=>"required|bool",
            'username'=>"required|min:3|max:27|unique:users"
        
        ]);
            $user = User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'gender'=>$request->gender       
            ,
            'password'=>bcrypt($request->password)
            
            ]);
            Profile::create([
                'about'=>$request->about,
                'location'=>$request->location,
                'date_birth'=>$request->date_birth,
                'user_id'=>$user->id
            ]);

            
            return redirect()->route("users");
        }
        if($type == "post"){
            $this->validate($request,[
                'body'=>'required'
            ]);
            Post::create([
                'body'=>$request->body,
                'user_id'=>Auth::id()
            ]);
            return redirect()->route("posts");
        }
        
    }

}

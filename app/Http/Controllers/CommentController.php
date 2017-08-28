<?php

namespace App\Http\Controllers;
use Auth;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\AddComment;
use App\User;
class CommentController extends Controller
{
    public function index($id){

return Comment::where("post_id",$id)->get();
     
    
    }
    public function create(Request $request){
        $comment = Comment::create([
        'post_id'=>$request->post_id,
        'user_id'=>Auth::id(),
        'comment'=>$request->content
        ]);
        if($comment->post->user_id != Auth::id()){
        Notification::send(User::find($comment->post->user_id),new AddComment(Auth::user()));
        }
        return Comment::find($comment->id);
    }
    public function delete($id){
        $comment = Comment::find($id);
        if($comment->user_id == Auth::id()){
        if($comment != null){
            $comment->delete();
            return $comment->id;
        }else{
            return 0;
        }
        }else{
            return Session::flash("error","you can't delete this comment");
        }
    }
    public function edit($id,Request $request){
                $comment = Comment::find($id);
        if(Auth::id() == $comment->user_id){

        if($comment != null){
        $comment->update([
        'comment'=>$request->comment
        ]);
        return $comment;
        }else{
            return Session::flash("error","we can't find this comment");
        }
        }else{
            return Session::flash("error","you can't edit this comment");
        }
    }
}

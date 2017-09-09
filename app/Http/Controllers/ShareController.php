
<?php
/*
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Share;
use App\User;
use Notification;
use App\Notifications\SharePost;
class ShareController extends Controller
{
    public function share($id){
       $share =  Share::create([
        'post_id'=>$id,
        "user_id"=>Auth::id()
        ]);

        $share->load("post");
           $share->post->setAttribute('shared',true);
       $share->post->setAttribute('user_shared',User::find($id)->name);
if($share->post->user_id != Auth::id()){
    Notification::send(User::find($share->post->user_id),new SharePost(Auth::user()));
}
        return $share->post;
        

    }
}
*/

<?php
use App\Status;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("profile",'ProfileController');
    Route::get("/add_friend/{id}","FriendController@add_friend");
    Route::get("/accept_friend/{id}","FriendController@accept_friend");
    Route::get("/check/{id}","FriendController@check");
    Route::get("/unread",function(){
        return Auth::user()->unreadNotifications;
    });
    Route::get("/notifications",'HomeController@notifications');
    Route::resource('post', 'PostController');
    Route::get("/all_status",function(){
        return Status::all();
    });
    Route::get("/feed","FeedController@feed");
    Route::get("/auth_user_data",function(){
        return Auth::user();
    });
    Route::get("/like/{id}","LikeController@like");
    Route::get("/unlike/{id}",'LikeController@unlike');
    Route::get("/count/{id}","LikeController@count");
    Route::get("/comment/{id}","CommentController@index");
    Route::post("/add_comment","CommentController@create");
    Route::get("/delete_comment/{id}","CommentController@delete");
    Route::post("/edit_comment/{id}","CommentController@edit");
    Route::get("/unfriend/{id}","FriendController@unfriend");
    Route::get("/profile_posts/{id}","FeedController@profile_posts");
    Route::get("/share/{id}","ShareController@share");
    Route::get('/delete_post/{id}',"FeedController@delete_post");

// admin area

    Route::group(['middleware'=>"admin"],function(){


    Route::get("/admin","AdminController@index")->name("index");
    Route::get("/admin/users","AdminController@users")->name("users");
    Route::get("/admin/get_users","AdminController@get_users")->name("get_users");
    Route::get("/admin/delete_user/{id}","AdminController@delete_user")->name("delete_user");
    Route::get("/admin/posts","AdminController@posts")->name("posts");
    Route::get("/admin/get_posts","AdminController@get_posts")->name("get_posts");

    Route::get("/admin/delete_post/{id}","AdminController@delete_post")->name("delete_post");
    Route::get("/admin/comments","AdminController@comments")->name("comments");
    Route::get("/admin/get_comments","AdminController@get_comments")->name("get_comments");
    Route::get("/admin/delete_comment/{id}","AdminController@delete_comment")->name("delete_comment");
    Route::get("/admin/likes","AdminController@likes")->name("likes");
    Route::get("/admin/get_likes","AdminController@get_likes")->name("get_likes");
    Route::get("/admin/delete_like/{id}","AdminController@delete_like")->name("delete_like");
    Route::get("/admin/edit/{type}/{id}","AdminController@edit");
     Route::post("/admin/update/{type}/{id}","AdminController@update")->name("admin_update");
    Route::get("/admin/add/{type}","AdminController@add")->name("add");
    Route::post("/admin/store/{type}","AdminController@store")->name("store");
    Route::get("/admin/settings",'AdminController@settings')->name("settings");
    Route::post("/admin/settings",'AdminController@update_settings');
    
    });
    
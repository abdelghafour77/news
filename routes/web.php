<?php
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

    Route::get('/',[PostController::class, 'index'])->name('home');
    Route::get('posts/{post:slug}',[PostController::class, 'show']);

// Route::get('/', function () {
//     // \Illuminate\Support\Facades\DB::listen(function($query){
//     //     logger($query->sql, $query->bindings);
//     // });
//     return view('posts',[
//         'posts' => Post::latest('id')->get()
//     ]);
// });
// Route::get('/', function () {
//     return view('posts');
// });


// Route::get('posts/{post:slug}', function (Post $post) {
//     return view('post',[
//         'post' => $post
//     ]);
// });

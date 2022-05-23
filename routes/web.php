<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
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
    Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
    Route::post('register',[RegisterController::class, 'store'])->middleware('guest');
    Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');
    Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
    Route::post('sessions',[SessionsController::class, 'store'])->middleware('guest');
    // Route::get('admin/posts/create',[PostController::class, 'create'])->middleware('admin');
// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Clockwork\Storage\Search;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [EmployeeController::class, 'home']);
// Route::get('/create', [EmployeeController::class, 'create']);
// Route::post('/store', [EmployeeController::class, 'store']);
// Route::post('/edit/{id}', [EmployeeController::class, 'edit']);
// Route::put('/update/{id}', [EmployeeController::class, 'update']);
// Route::delete('/delete/{id}', [EmployeeController::class, 'destroy']);
// Route::post('/search', [EmployeeController::class, 'search']);


Route::controller(EmployeeController::class)->group(function(){
    Route::get('/','home');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::post('/edit/{id}','edit');
    Route::put('/update/{id}','update');
    Route::delete('/delete/{id}','destroy');
    Route::post('/search','search');
    Route::get('/edit/{id}','edit');

    Route::get('/tryhasmany','tryhasmany');
    Route::get('/trybelongsto','trybelongsto');
    Route::get('/supervisor','supervisor')->name('home')->middleware('auth');
    Route::post('/view/member/{id}','viewmember');
});

// Route::get('/', [EmployeeController::class, 'home']);


Route::controller(UserController::class)->group(function(){
    Route::get('/userlogin','login')->name('login')->middleware('guest');
    Route::get('/register','register');
    Route::post('/create_account','create');
    Route::post('/login/process','process');
    Route::post('/logout','logout');
});


Route::get('/posts',function(){
    return view('posts');
});


// Route::get('posts/{post}',function($slug){

//     $post = Post::find($slug);

//     $path = __DIR__. "/../resources/posts/{$slug}.html";
//     if(! file_exists($path)){

//         abort(404);
//     }

//     $post = cache()->remember("posts.{$slug}",5, fn() =>  file_get_contents($path));

//     return view('post',['post' => $post ]);
// });



Route::get('/blades',function(){
    return view('page');
});

Route::get('/posts/{post:slug}',function(Post $post){
    // return view('page');
    return $post->title;
});


Route::get('/manual', [UserController::class, 'createmanual']);
Route::get('/create/post', [UserController::class, 'post']);
Route::get('/view/post', [UserController::class, 'viewpost']);


Route::get('/categories/{category}',function(Category $category){
    // return view('page');
    return view('post',[
        'posts' => $category->posts
    ]);
});

Route::get('/view/post/user', [UserController::class, 'userpost']);

Route::get('author/{author}', function($slug){
    // $author = file_get_contents;    
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path)){
        abort(404);
    }
    $author = file_get_contents($path);

    return view('try.author',[
        'author' => $author
    ]);
});


Route::get('search', function(){ 
    return view('try.search');
});

Route::get('search', function(){ 
    return view('try.search');
});

Route::get('/search/request/', [UserController::class, 'search']);

Route::get('blade/htmlcss/', function(){ 
    return view('htmlcss.blade');
});








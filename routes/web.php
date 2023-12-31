<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Slug;
use App\Models\User;
use App\Services\Newsletter;
use Clockwork\Storage\Search;
use MailchimpMarketing\ApiClient;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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
    Route::get('/supervisor','supervisor')->middleware('auth');
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

Route::get('/view/post/user', [UserController::class, 'userpost'])->middleware('auth');

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

Route::get('/search/request/', [PostController::class, 'search']);
Route::get('/category/request/', [PostController::class, 'search']);


Route::get('blade/htmlcss/', function(){ 
    return view('htmlcss.blade');
});

Route::post('/post/{comment}', [UserController::class, 'comment']);
    // return view('htmlcss.blade');



// Route::get('boolean/{bool}',function($bool){

//     return $bool === 'bool' ? $bool : "default";
//     // return $name ?? false;
    
// });

Route::get('/boolean/{bool}',fn($bool) => $bool === 'bool' ? $bool : "default");

Route::get('/comment', [CommentController::class, 'show']);

Route::get('mail', function(){ 
    dd(config('services.mailchimp'));
});


// Route::get('ping',function(){
    
//     $mailchimp = new \MailchimpMarketing\ApiClient();

//     $mailchimp->setConfig([
//         'apiKey' => config('services.mailchimp.key'),
//         'server' => 'us21'
//     ]);

//     // $response = $mailchimp->ping->get();
//     // $response = $mailchimp->lists->getAllLists();
//     // $response = $mailchimp->lists->getList("74d606f65b");
//     // $response = $mailchimp->lists->getListMembersInfo("74d606f65b");
//     $response = $mailchimp->lists->addListMember("74d606f65b" , [
//         "email_address" => "madlangsakay.arjhen05@gmail.com",
//         "status" => "subscribed",
//     ]);

//     ddd($response);
// });

// Route::post('newsletter/',function(){
    Route::post('newsletter/',function(Newsletter $newletter){


    request()->validate(['email' => 'required|email']);
    
    // $mailchimp = new \MailchimpMarketing\ApiClient();

    // $mailchimp->setConfig([
    //     'apiKey' => config('services.mailchimp.key'),
    //     'server' => 'us21'
    // ]);

    // $response = $mailchimp->ping->get();
    // $response = $mailchimp->lists->getAllLists();
    // $response = $mailchimp->lists->getList("74d606f65b");
    // $response = $mailchimp->lists->getListMembersInfo("74d606f65b");
    try{
        // $response = $mailchimp->lists->addListMember("74d606f65b" , [
        //     "email_address" => request('email'),
        //     "status" => "subscribed",
        // ]);


        // $newletter = new Newsletter();
        $newletter->subscribe(request('email'));
    }
    catch(\Exception $e){
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }
    

    return back()->with('message','You are signed up for our newletter');
});

Route::post('newsletter/controller',NewsletterController::class);

Route::get('/subscribe',function(){
    return view('user.newsletter');
});

Route::get('testing/case',function(){
    app()->get('foo');
    return resolve('foo');
});


Route::middleware('admin')->group(function(){
    Route::get('admin/post/create',[AdminController::class,'create']);
    Route::post('admin/store',[AdminController::class,'store']);
});


Route::get('slug/{slug}',function($slug){
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}")){
        return 'none';
    }

    cache()->remember("slug/{$slug}",5,function() use ($path){
        var_dump($path);
        return file_get_contents($path);
    });

});


Route::get('eps11/{slug}',function($slug){

    $postslug = Slug::find($slug);
    return $postslug;

});

Route::get('getall',function(){

    $postslug = Slug::all();
    dd($postslug[0]->getContents());
    dd($postslug);

});

Route::get('yaml',function(){
    $document = YamlFrontMatter::parseFile(
        resource_path('posts/my-first-post')
    );
    ddd($document);
});


Route::get('/hasone',function(){
    $posts = Post::with('category')->get();
    dd($posts);

    return view('try.tryhasone',['posts' => $posts]);
});


Route::get('/anthony/{id}',function($id){
    // $comments = Comment::find($id);
    return view('try.tryhasone',['comments' => Comment::find($id)]);
});

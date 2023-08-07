<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Employees;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function comment($post){

        request()->validate([
            'body' => 'required'
        ]);

        $user = request()->user()->id;
        $body = request()->comment;


        Comment::create([
            'post_id' => $post,
            'user_id' => $user,
            'body' => $body
        ]);
        
        return back();

    }

    public function userpost(){
        // $posts = Post::latest()->with('author','category')->take(5)->get();

        // return view('try.manyrelationship',['posts' => $posts]);

        $posts = Post::latest()->with('author','category','comments')->paginate(5);
        $comments = Comment::with('post')->get();


    
        // return view('try.manyrelationship',['posts' => $posts]);
        return view('try.manyrelationship',
                ['posts' => $posts],
                ['comments' => $comments]);
    }


    public function createmanual(){
        // $user = new User;
        // $user->name = "Ron";
        // $user->email = "rongods@gmail.com";
        // $user->password = bcrypt('!password');
        // $user->save();


        // $user = User::findorFail(12);
        // dd($user->pluck('name'));

        $user = User::all();
        // dd($user->first());
        dd($user[3]);

    }

    public function post(){
        // $post = new Post;
        // $post->title = '<h1>My Second Post</h1>';
        // $post->excerpt = 'lorem jgfjkgjh jghdfjkg jkgfj';
        // $post->body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptatum libero tenetur atque porro consequatur ratione optio ducimus repellendus autem?';
        // $post->save();

        // $post = Post::count();
        // $post = Post::find(1);
        // $title = $post->title;
        // dd($title);

        // Post::create(['title' => 'My Second Post', 'slug' => 'my-second-post', 'excerpt' => 'idunno', 'body' => 'nobody']);
        // Post::create(['title' => 'My Third Post', 'category_id' => 2, 'slug' => 'my-third-post', 'excerpt' => 'idunno', 'body' => 'nobody']);


        // Category::create(['name' => 'Work', 'slug' => 'work']);



        // $post = Post::find(1);
        // $post->update(['title' => 'My First Post']);
        // $post->delete();
        // $post = Post::first();
        // $post->category->name;

        $category = Category::first();
        dd($category->posts);
        // $post->category->name;
    }


    // public function viewpost(){
    //     $posts = Post::with('category')->get();
    //     dd($posts);
    //     return view('post',['posts' => $posts]);
    // }

    public function viewpost(){
        $posts = Post::with('category')->get();
        dd($posts);
        return view('post',['posts' => $posts]);
    }


    public function register(){
        return view('user.register',['title' => 'Register']);
    }

    // public function create(Request $request){
    //     $validate = $request -> validate([
    //         "name" => ['required','min:4'],
    //         "email" => ['required','email',Rule::unique('users','email')],
    //         "password" => 'required|confirmed|min:6',
    //     ]);

    //     $validate['password'] = Hash::make($validate['password']);
    //     User::create($validate);
    //     return redirect('/register')->with('message','Register Successfully');
    // }

    public function create(){
        // var_dump(request()->all());
        $attributes = request()->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email', // same code to all //
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:8',
        ]);

        // $attributes['password'] = bcrypt($attributes['password']);

        // return $attributes;

        // return ucwords($attributes['name']);
        User::create($attributes);
        
        // session()->flash('message','Created Successfully');
        return redirect('/register')->with('message','Created Successfully');

    }

    public function login(){
        return view('user.login',['title' => 'Login']);
    }

    public function process(Request $request){
        $validate = $request -> validate([
            "email" => ['required'],
            "password" => 'required',
        ]);
        if(auth()->attempt($validate)){
            $request->session()->regenerate();
            return redirect('/supervisor')->with('message','Welcome Back');
        }
        // return back()->withErrors(['email' => 'Invalid Credentials']);
        // else
        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials'
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/userlogin')->with('message','Logout Successfully');
    }

    


      
}

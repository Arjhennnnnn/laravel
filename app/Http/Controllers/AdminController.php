<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    public function create(){
        // if(auth()->guest()){
        //     // abort(403);     
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // if(auth()->user()?->name != 'Arjhen'){
        //     abort(Response::HTTP_FORBIDDEN);
        // }
        $categories = Category::all();
        return view('admin.create',['categories' => $categories]);
    }

    public function store(){

        // $path = request()->file('thumbnail')->store('thumbnails');

        // return 'Done'.$path;

        // dd(request()->file('thumbnail'));
        
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required',Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/view/post/user')->with('message','Added Successfully');
    }
}



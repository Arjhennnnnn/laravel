<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function search(){
        // dd(request(['search']));
        dd(Post::latest()->filter(request(['search','category']))->get());
        // dd(Category::Where('slug',request('category'))->get());

    } 

    // cleaner
    // public function getPost(){
    //     // $posts = Post::latest();
    //     // $posts->where('title','like','%'.request('search').'%')
    //     //       ->orWhere('body','like','%'.request('search').'%');
    //     // return $posts->get();

    //     return Post::latest()->filter()->get();
    // }
}

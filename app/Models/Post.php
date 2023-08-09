<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','excerpt','body','id','category_id'];

    // public function scopeFilter($query){

    //     $query->where('title','like','%'.request('search').'%')
    //            ->orWhere('body','like','%'.request('search').'%')
    //            ->orWhere('slug','like','%'.request('search').'%');
    // }

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
                $query->where('title','like','%'. $search .'%')
                       ->orWhere('body','like','%'. $search .'%')
                       ->orWhere('slug','like','%'. $search .'%');

        });
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            // $query
            //     ->whereExists(fn($query) =>
            //         $query->from('categories')
            //             ->whereColumn('categories.id','post.categories_id')
            //             ->where('categories.slug', $category))
            $query
            ->whereHas('category',fn($query) =>
                $query->where('slug',$category)
                )
            );
        }


    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    // public function comments(){
    //     return $this->belongsTo(Comment::class);
    // }


        public function comments(){
            return $this->hasMany(Comment::class,'post_id','id');
        }

    
}

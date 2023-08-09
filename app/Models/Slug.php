<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Slug{

    public static function all(){
        return File::files(resource_path(("posts")));
    }

    public static function find($slug){

        base_path();
        if(!file_exists($path = resource_path("posts/{$slug}.html"))){
            // abort(404);
            throw new ModelNotFoundException();
        }

        cache()->remember("slug/{$slug}",5,function() use ($path){
            var_dump($path);

        return file_get_contents($path);
        });
    }

}
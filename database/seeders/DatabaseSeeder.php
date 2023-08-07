<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Post::truncate();
        // Category::truncate();


        // $user = User::factory()->create();
        //  Post::factory(5)->create();


        // $category = Category::create([
        //     'name' => 'Junior',
        //     'slug' => 'Junior'
        // ]);

        // Post::create([
        //     'title' => 'My Second Post',
        //     'user_id' => $user->id,
        //     'category_id' => $category->id,
        //     'slug' => 'my-second-post',
        //     'excerpt' => 'idunno',
        //     'body' => 'nobody'
        // ]);
        


        // $post = Post::find(1);
        // $post->update([
        //     'slug' => 'my-first-post',
        // ]);


        Comment::create([
            'post_id' => 1,
            'user_id' => 1,
            'body' => 'bodybody',
        ]);
        



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        // $posts = [
        //     [
        //         'title' => 'Getting started with php',
        //         'content' => 'php is one of the most widely use scripting language because 
        //         of it dynamic funtionality',
        //         'image_url' => null,
        //         'category_id' => 'eb57d3c3-1e15-4522-a724-ce49a0aee6a9',
        //         'slug' =>  'Getting-started-with-php',
        //         'user_id' => '7310eb9e-7a0d-4548-9b60-aaed6026c966',
        //         'status' => 'Published',
        //     ],
        // ];

        // foreach($posts as $post){
        //     Post::updateOrCreate($post);
        // }

        Post::factory()->count(6)->create();
    }
}

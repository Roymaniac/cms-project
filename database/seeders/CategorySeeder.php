<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        // $categories = [
        //     [
        //         'name' => 'PHP',
        //         'description' => 'PHP Programming',
        //         'slug' => 'php'
        //     ],

        //     [
        //         //
        //         'name' => 'JavaScript',
        //         'description' => 'JavaScript Programming',
        //         'slug' => 'javascript',
        //     ],

        //     [
        //         //
        //         'name' => 'Python',
        //         'description' => 'Python Programming',
        //         'slug' => 'python'
        //     ]
        // ];

        // foreach ($categories as $category) {
        //     Category::updateOrCreate($category);
        // }

        Category::factory()->count(5)->create();
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_id = Category::inRandomOrder()->first()->id;
        $user_id = User::inRandomOrder()->first()->id;
        return [
            'title' => $this->faker->sentence($nbWords = 12, $variableNbWords = true),
            'content' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(),
            'category_id' => $category_id,
            'slug' => $this->faker->slug(),
            'user_id' => $user_id,
            'status' => $this->faker->randomElement(['Published','Archived','Draft'])
        ];
    }
}

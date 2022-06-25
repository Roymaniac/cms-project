<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->randomElement(['Python', 'PHP', 'Laravel', 'Javascript', 'NodeJs']),
            'description' => $this->faker->randomElement([
                'Python Programming', 'PHP Programming', 'NodeJs', 'JavaScript Programming', 'Laravel Framework'
            ]),
            'slug' => $this->faker->slug()
        ];
    }
}

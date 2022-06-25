<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $users = [
        //     [
        //         'first_name' => 'John',
        //         'last_name' => 'Doe',
        //         'email' => 'jdoe@gmail.com',
        //         'password' => bcrypt('johnode')
        //     ],

        //     [
        //         'first_name' => 'Liz',
        //         'last_name' => 'Goodman',
        //         'email' => 'gooodmanliz@yahoo.com',
        //         'remember_token' => Str::random(10),
        //         'password' => bcrypt('lizgoodman')
        //     ],

        //     [
        //         'first_name' => 'Admin',
        //         'last_name' => 'Tee',
        //         'email' => 'admin@admin.com',
        //         'password' => bcrypt('lizgoodman')
        //     ]
        // ];


        // foreach ($users as $user) {
        //     User::updateOrCreate($user);
        // }

        User::factory()->count(10)->create();
    }
}

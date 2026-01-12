<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    private $users;

    public function __construct()
    {
        $this->users = \App\Models\User::all()->pluck('id')->toArray();
    }
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
       for ($i = 0; $i < 50; $i++) {
            Post::create([
            'title' => $faker->jobTitle,
            'content' => $faker->paragraphs(5, true),
            'user_id' => $faker->randomElement($this->users),
        ]);
       }
    }
}

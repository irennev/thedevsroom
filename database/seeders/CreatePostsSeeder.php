<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
use App\Models\User;

class CreatePostsSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $faker = Faker::create();

        factory(\App\Models\Category::class, 5)->create();

        //\App\Models\Category::factory()->count(5)->create(); 

        for ($i = 0; $i < 20; $i++) {

            $category = \App\Models\Category::find(random_int(1, 5));

            $title = $faker->sentence("5");

            $post = $category->posts()->create([
                "title" => $title,
                "body"  => $faker->text,
                "category_id" => random_int(1, 5),
                "user_id" => factory(User::class)->create()->id,
                "online" => true,
                "visits" => random_int(0, 50)
            ]);

        }

    }
}
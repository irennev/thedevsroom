<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateUsersSeeder::class);
        $this->call(CreatePostsSeeder::class);
        $this->call(CreateCategoriesSeeder::class);
        $this->call(CreateTagsSeeder::class);
    }
}

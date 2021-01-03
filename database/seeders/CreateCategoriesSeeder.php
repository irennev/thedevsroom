<?php

namespace Database\Seeders;  

use Illuminate\Database\Seeder;

use App\Models\Category;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
               'name'=>'Artificial Intelligence',
               'slug'=>'ai',
            ],

            [
                'name'=>'Computational Complexity',
                'slug'=>'cc',
            ],

            [
                'name'=>'Cryptography and Security',
                'slug'=>'cr',
            ],

            [
                'name'=>'Data Structures and Algorithms',
                'slug'=>'dsa',
            ],
            
            [
                'name'=>'Databases',
                'slug'=>'db',
            ],
        ];

  

        foreach ($categories as $key => $value) {

            Category::create($value);

        }
    }
}

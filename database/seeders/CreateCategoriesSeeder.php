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
            ],

            [
                'name'=>'Computational Complexity',
            ],

            [
                'name'=>'Cryptography and Security',
            ],

            [
                'name'=>'Data Structures and Algorithms',
            ],
            
            [
                'name'=>'Databases',
            ],
        ];

  

        foreach ($categories as $key => $value) {

            Category::create($value);

        }
    }
}

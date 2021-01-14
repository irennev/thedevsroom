<?php

namespace Database\Seeders;  

use Illuminate\Database\Seeder;

use App\Models\Tag;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [

            [
               'name'=>'php',
            ],

            [
                'name'=>'sql',
            ],

            [
                'name'=>'c++',
            ],

            [
                'name'=>'java',
            ],
            
            [
                'name'=>'database',
            ],
        ];

  

        foreach ($tags as $key => $value) {

            Tag::create($value);

        }
    }
}

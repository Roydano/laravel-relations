<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Informatica',
            'Cucina',
            'Cinema',
            'Sport',
            'Attualità',
            'Business & Finanza'
        ];

        foreach($categories as $category){

            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category,'-');

            $newCategory->save();
        }
    }
}

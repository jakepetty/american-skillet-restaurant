<?php

use Illuminate\Database\Seeder;

class MenuCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $categories = [
        'Breakfast',
        'Lunch',
        'Kids',
        'Drinks',
        'Appetizers',
        'Desserts'
    ];
    public function run()
    {
        //
        foreach ($this->categories as $name) {
            $category = new \App\MenuCategory();
            $category->name = $name;
            $category->seo_url = str_slug($name);
            $category->ext = 'jpg';
            $category->save();
        }
    }
}

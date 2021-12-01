<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::truncate();
        Category::create([
            'name' => 'High Tech',
            'slug' => 'high tech'
        ]);

        Category::create([
            'name' => 'Livres',
            'slug' => 'livres'
        ]);

        Category::create([
            'name' => 'Meubles',
            'slug' => 'meubles'
        ]);

        Category::create([
            'name' => 'Nourritures',
            'slug' => 'nourritures'
        ]);

        Category::create([
            'name' => 'Jeux',
            'slug' => 'jeux'
        ]);
    }
}

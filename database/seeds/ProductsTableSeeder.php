<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // for ($i = 1; $i <= 10; $i++)
        for ($i = 0; $i < 40; $i++){
          Product::create([
            'title' => $faker->sentence(3),
            'slug' => $faker->slug,
            'subtitle' => $faker->sentence(5),
            'description' => $faker->text,
            'price' => $faker->numberBetween(15, 300) * 100,
            'image1' => 'https://via.placeholder.com/200x250',
            'image2' => 'https://via.placeholder.com/200x250',
            'image3' => 'https://via.placeholder.com/200x250',
            'image4' => 'https://via.placeholder.com/200x250'
          ])->categories()->attach([
              rand(1, 4),
              rand(1, 4)
          ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $index = 1; $index <= 50; $index++ ) {
            $faker = Faker\Factory::create('ja_JP');
            Post::create([
            'user_id' => $index,
            'title' => $faker->sentence(1),
            'content' => $faker->text
            ]);
        }
    }
}

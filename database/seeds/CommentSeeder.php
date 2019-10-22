<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
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
            Comment::create([
            'post_id' => $index,
            'user_id' => $index,
            'content' => $faker->sentence(30)
            ]);
        }
    }
}

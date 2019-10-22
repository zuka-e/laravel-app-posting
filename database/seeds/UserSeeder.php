<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
            User::create([
            'name' => "$faker->lastName $faker->firstName",
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => Hash::make('password'),
            ]);
        }
    }
}

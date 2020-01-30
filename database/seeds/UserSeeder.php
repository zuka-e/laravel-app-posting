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
        User::create([ # test_user
            'name' => "user",
            'phone_number' => '',
            'email' => 'user@test.com',
            'email_verified_at' => Carbon\Carbon::now(),
            'password' => Hash::make('password'),
            ]);

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

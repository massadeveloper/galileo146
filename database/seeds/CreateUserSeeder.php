<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Application;
use App\Models\Application as ModelsApplication;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrator',
            'email' => 'email@gmail.com',
            'is_admin' => '1',
            'password' => bcrypt('password')
        ]);
        
        $faker = Faker\Factory::create();
        foreach (range(1, 20) as $index) {
            $firstName = $faker->firstName;

            $lastName = $faker->lastName;

            $email = $firstName[0] . $lastName . '@' . $faker->safeEmailDomain;

            $id = User::create([
                'name' => $firstName,
                'email' => $email,
                'is_admin' => '0',
                'password' => bcrypt('password')
            ])->id;
            Application::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => $faker->phoneNumber(),
                'notes' => $faker->text,
                'user_id' => $id
            ]);
        }
    }
}

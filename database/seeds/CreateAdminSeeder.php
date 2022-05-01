<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateAdminSeeder extends Seeder
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
    }
}

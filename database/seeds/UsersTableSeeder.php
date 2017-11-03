<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'le van hai',
            'email' => '1@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),

        ]);
        factory(User::class, 50)->create();

    }
}

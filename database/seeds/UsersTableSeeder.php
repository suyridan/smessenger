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
            'name' => 'Alberto',
            'email' => 'hernandezsalberto@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Lili',
            'email' => 'lili@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Itzama',
            'email' => 'itzamaposada@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Roberto',
            'email' => 'the_fall_of_reach@hotmail.es',
            'password' => bcrypt('123456')
        ]);
    }
}

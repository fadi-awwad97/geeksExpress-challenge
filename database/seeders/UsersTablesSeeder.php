<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        USer:create([
            'name' => 'Fadi',
            'phone_number' => '76818836'
            'email' => 'Fadi.awwad@gmail.com',
            'password' =>Hash::make('password'),
            "remember_token" => str_random(10),
        ])
    }
}

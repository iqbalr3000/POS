<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@pos.com',
                'role'=>'admin',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Kasir',
                'email'=>'kasir@pos.com',
                'role'=>'kasir',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Manager',
                'email'=>'manager@pos.com',
                'role'=>'manager',
                'password'=> bcrypt('123456'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin@tokokastem.com',
                'is_admin'=>'1',
                'password'=> bcrypt('xyz123'),
            ],
            [
                'name'=>'Regular User',
                'email'=>'reguser@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('xyz123'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}

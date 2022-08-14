<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Admin User',
                'email'=>'admin@itsolutionstuff.com',
                'type'=>1,
                'password'=> bcrypt('123456'),
                'url'=>'http://google.com',
            ],
            [
                'name'=>'Manager User',
                'email'=>'manager@itsolutionstuff.com',
                'type'=> 2,
                'password'=> bcrypt('123456'),
                'url'=>'http://yahoo.com',
            ],
            [
                'name'=>'User',
                'email'=>'user@itsolutionstuff.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
                'url'=>'http://msn.com',
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

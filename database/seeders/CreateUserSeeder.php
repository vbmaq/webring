<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Nette\Utils\Random;

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
//            [
//                'name'=>'Admin User',
//                'email'=>'admin@itsolutionstuff.com',
//                'type'=>1,
//                'password'=> bcrypt('123456'),
//                'url'=>'http://google.com',
//            ],
//            [
//                'name'=>'Manager User',
//                'email'=>'manager@itsolutionstuff.com',
//                'type'=> 2,
//                'password'=> bcrypt('123456'),
//                'url'=>'http://yahoo.com',
//            ],

            [
                'name'=>Str::random(30),
                'email'=>Str::random(30) . '@thing.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
                'url'=>Str::random(30),
                'isActive'=>true,
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

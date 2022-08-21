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
            [
                'name'=>'Admin User',
                'email'=>'admin@vbmIT.de',
                'type'=>1,
                'password'=> bcrypt('987654321'),
            ],
            [
                'name'=>'Alice',
                'email'=>Str::random(30) . '@thing.com',
                'type'=>0,
                'password'=> bcrypt('987654321'),
                'url'=>Str::random(30),
            ],
            [
                'name'=>'Bingus',
                'email'=>Str::random(30) . '@thing.com',
                'type'=>0,
                'password'=> bcrypt('987654321'),
                'url'=>Str::random(30),
            ],
            [
                'name'=>'Cantilever',
                'email'=>Str::random(30) . '@thing.com',
                'type'=>0,
                'password'=> bcrypt('987654321'),
                'url'=>'https://starfleetrambo.neocities.org/page1.html',
//                'isActive'=>true,
            ],
            [
                'name'=>'Dingus',
                'email'=>Str::random(30) . '@thing.com',
                'type'=>0,
                'password'=> bcrypt('987654321'),
                'url'=>'https://starfleetrambo.neocities.org/page2.html',
//                'isActive'=>true,
            ],
            [
                'name'=>'Endling',
                'email'=>Str::random(30) . '@thing.com',
                'type'=>0,
                'password'=> bcrypt('987654321'),
                'url'=>'https://starfleetrambo.neocities.org/',
//                'isActive'=>true,
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class UsersTableSeeder extends Seeder
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
            'name' => 'test',
            'email' => '111@mail.com',
            'password' =>bcrypt('1234567890'),
            'img_url' => '/images/profile/man.jpg',
            'manager_id' => null
        ],
        [
            'name' => 'test2',
            'email' => '222@mail.com',
            'password' => bcrypt('1234567890'),
            'img_url' => '/images/profile/woman.jpg',
            'manager_id' => null
        ],
        [
            'name' => 'staff1',
            'email' => 'staff1@mail.com',
            'password' => bcrypt('1234567890'),
            'img_url' => '/images/profile/cat.jpg',
            'manager_id' => '1'
        ],
        ];
    foreach ($users as $user) 
        {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'img_url' => $user['img_url'],
                'manager_id' => $user['manager_id'],
            ]);
        }
    }
}

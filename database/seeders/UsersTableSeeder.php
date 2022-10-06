<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                      => 1,
                'fname'                   => 'Super',
                'mnames'                  => '',
                'lname'                   => 'Admin',
                'username'                => 1 ,
                'email_verified_at'       => '2022-09-29 11:29:41' ,
                'email'                   => 'admin@admin.com',
                'password'                => bcrypt('password'),
                'remember_token'          => null,
            ],
        ];

        User::insert($users);
    }
}

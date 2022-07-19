<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{
    public function run()
    {
        $subscribers = [
            [
                'id'             => 1,
                'account'        => 1 ,
                 'user_id'      => 1,
                 'dob'   => "2001/01/01",
                 'address'       => 'no',
                 'gender'       => 'Female',
                 'city'       => 'Bulawayo',
                 'country'    => 'Zimbabwe',
                 'cell'      => '+26398',
                 'identity'     => '908'
            ],
        ];

        Subscriber::insert($subscribers);
    }
}

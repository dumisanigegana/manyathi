<?php

namespace Database\Seeders;

use App\Models\Subphase;
use Illuminate\Database\Seeder;

class SubphasesTableSeeder extends Seeder
{
    public function run()
    {
        $subphases = [
            [
                'id'    => 1,
                'phase_id' => 1,
                'name' => 'Admin',
                'possition' => 1,
                'description' => ''
            ],
            [
                'id'    => 2,
                'phase_id' => 1,
                'name' => 'User',
                'possition' => 2,
                'description' => ''
            ],
        ];

        Subphase::insert($subphases);
    }
}

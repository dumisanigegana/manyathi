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
                'description' => ''
            ],
            [
                'id'    => 2,
                'phase_id' => 1,
                'name' => 'User',
                'description' => ''
            ],
        ];

        Subphase::insert($subphases);
    }
}

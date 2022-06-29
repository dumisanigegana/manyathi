<?php

namespace Database\Seeders;

use App\Models\Subphases;
use Illuminate\Database\Seeder;

class SubphasesTableSeeder extends Seeder
{
    public function run()
    {
        $subphases = [
            [
                'id'    => 1,
                'phase_id' => 1,
                'phase' => 'Admin',
                'description' => ''
            ],
            [
                'id'    => 2,
                'phase_id' => 1,
                'phase' => 'User',
                'description' => ''
            ],
        ];

        Phase::insert($subphases);
    }
}

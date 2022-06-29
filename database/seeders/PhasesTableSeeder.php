<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Seeder;

class PhasesTableSeeder extends Seeder
{
    public function run()
    {
        $phases = [
            [
                'id'    => 1,
                'phase' => 'Admin',
                'description' => ''
            ],
            [
                'id'    => 2,
                'phase' => 'User',
                'description' => ''
            ],
        ];

        Phase::insert($phases);
    }
}

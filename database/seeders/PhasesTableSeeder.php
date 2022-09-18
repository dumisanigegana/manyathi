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
                'name' => 'One',
                'description' => ''
            ],
            [
                'id'    => 2,
                'name' => 'Celebration',
                'description' => ''
            ],
        ];

        Phase::insert($phases);
    }
}

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
                'name' => 'Admin',
                'description' => ''
            ],
            [
                'id'    => 2,
                'name' => 'User',
                'description' => ''
            ],
        ];

        Phase::insert($phases);
    }
}

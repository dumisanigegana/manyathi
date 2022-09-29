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
                'name' => 'Initiation',
                'description' => 'Buy the book and signup'
            ],
            [
                'id'    => 2,
                'name' => 'Implementation',
                'description' => 'Invite 12 disciples'
            ],
        
            [
                'id'    => 4,
                'name' => 'Empowerment',
                'description' => 'Preperation & Empowerment	'
            ],
            [
                'id'    => 5,
                'name' => 'Abundance',
                'description' => 'Buy book 2, give until you earn $103000000'
            ],
            
            [
                'id'    => 6,
                'name' => 'Celebration',
                'description' => 'Celebration and visitations'
            ],
        ];

        Phase::insert($phases);
    }
}

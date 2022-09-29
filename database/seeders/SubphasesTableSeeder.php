<?php

namespace Database\Seeders;

use App\Models\Subphase;
use Illuminate\Database\Seeder;

class SubphasesTableSeeder extends Seeder
{
    public function run()
    { //Activity
        $subphases = [
            [
                'id'    => 1,
                'phase_id' => 1,
                'name' => 'Buy book',
                'possition' => 1,
                'description' => 'Buy the book ...',
                'action' => 'buy_book',
                'data' => null
            ],
            [
                'id'    => 2,
                'phase_id' => 1,
                'name' => 'Create an account',
                'possition' => 2,
                'description' => 'Signup to create an account',
                'action' => 'register',
                'data' => null
            ],
            [
                'id'    => 3,
                'phase_id' => 2,
                'name' => 'Invite 12 disciples',
                'possition' => 1,
                'description' => 'Invite 12 people to buy the book',
                'action' => 'none',
                'data' => null
            ],
            [
                'id'    => 4,
                'phase_id' => 2,
                'name' => 'Desciples Creates an account',
                'possition' => 2,
                'description' => 'Ensure that all your desciples Creates an account',
                'action' => 'none',
                'data' => null
            ],
            [
                'id'    => 5,
                'phase_id' => 3,
                'name' => 'Give $5',
                'possition' => 1,
                'description' => 'Give upliner $5 and submit proof of payment',
                'action' => 'give',
                'data' => 5
            ],
            [
                'id'    => 6,
                'phase_id' => 3,
                'name' => 'Receive $60',
                'possition' => 2,
                'description' => 'Receive $5 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],
            [
                'id'    => 7,
                'phase_id' => 3,
                'name' => 'Give $60',
                'possition' => 3,
                'description' => 'Give upliner $60 and submit proof of payment',
                'action' => 'give',
                'data' => 60
            ],
            [
                'id'    => 8,
                'phase_id' => 3,
                'name' => 'Receive $720',
                'possition' => 4,
                'description' => 'Receive $65 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],
            [
                'id'    => 9,
                'phase_id' => 3,
                'name' => 'Give $720',
                'possition' => 5,
                'description' => 'Give upliner $720 and submit proof of payment',
                'action' => 'give',
                'data' => 720
            ],
            [
                'id'    => 10,
                'phase_id' => 3,
                'name' => 'Receive $8640',
                'possition' => 6,
                'description' => 'Receive $720 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],
            [
                'id'    => 11,
                'phase_id' => 3,
                'name' => 'Give $8640',
                'possition' => 7,
                'description' => 'Give upliner $8640 and submit proof of payment',
                'action' => 'give',
                'data' => 8640
            ],
            [
                'id'    => 12,
                'phase_id' => 3,
                'name' => 'Receive $103 680',
                'possition' => 9,
                'description' => 'Receive $8 640 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],
            [
                'id'    => 13,
                'phase_id' => 3,
                'name' => 'Collect $53 680',
                'possition' => 10,
                'description' => 'The system gives you $53680 and qualify for Abundance phase',
                'action' => 'collect',
                'data' => 53680
            ],
            
            [
                'id'    => 14,
                'phase_id' => 4,
                'name' => 'Buy the book',
                'possition' => 1,
                'description' => 'Buy the book to upgrade to Abundance phase',
                'action' => 'buy_book',
                'data' => 2
            ],
            [
                'id'    => 15,
                'phase_id' => 4,
                'name' => 'Give $50 000',
                'possition' => 2,
                'description' => 'Give upliner $50 000 and submit proof of payment',
                'action' => 'give',
                'data' => 50000
            ],
            [
                'id'    => 16,
                'phase_id' => 4,
                'name' => 'Receive $600 000',
                'possition' => 3,
                'description' => 'Receive $50 000 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],
            [
                'id'    => 17,
                'phase_id' => 4,
                'name' => 'Give $600 000',
                'possition' => 4,
                'description' => 'Give upliner $600 000 and submit proof of payment',
                'action' => 'give',
                'data' => 600000
            ],
            [
                'id'    => 18,
                'phase_id' => 4,
                'name' => 'Receive $7 200 000',
                'possition' => 5,
                'description' => 'Receive $600 000 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],          
            [
                'id'    => 19,
                'phase_id' => 4,
                'name' => 'Give $7 200 000',
                'possition' => 6,
                'description' => 'Give upliner $7 200 000 and submit proof of payment',
                'action' => 'give',
                'data' => 7200000
            ],
            [
                'id'    => 20,
                'phase_id' => 4,
                'name' => 'Receive $86 400 000',
                'possition' => 7,
                'description' => 'Receive $7 200 000 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],        
            [
                'id'    => 21,
                'phase_id' => 4,
                'name' => 'Give $86 400 000',
                'possition' => 8,
                'description' => 'Give upliner $86 400 000 and submit proof of payment',
                'action' => 'give',
                'data' => 864000000
            ],
            [
                'id'    => 22,
                'phase_id' => 4,
                'name' => 'Receive $1 036 800 000',
                'possition' => 9,
                'description' => 'Receive $86 400 000 from each of your disciple and confirm receipt of funds',
                'action' => 'receive',
                'data' => null
            ],           
            [
                'id'    => 23,
                'phase_id' => 4,
                'name' => 'Collect $1 030 000 000',
                'possition' => 10,
                'description' => 'The system gives you $1 030 000 000 and qualify for Celebrations phase',
                'action' => 'collect',
                'data' => 1030000000
            ],
            [
                'id'    => 24,
                'phase_id' => 5,
                'name' => 'Give $6 800 000',
                'possition' => 1,
                'description' => 'Give $6 800 000 for Celebrations Phase',
                'action' => 'give',
                'data' => 6800000
            ],
            [
                'id'    => 25,
                'phase_id' => 5,
                'name' => 'Buy Celabrations meterials',
                'possition' => 2,
                'description' => '',
                'action' => 'none',
                'data' => null
            ],
            [
                'id'    => 26,
                'phase_id' => 5,
                'name' => 'Celebrations activities',
                'possition' => 3,
                'description' => '',
                'action' => 'none',
                'data' => null
            ],
            
        ];

        Subphase::insert($subphases);
    }
}

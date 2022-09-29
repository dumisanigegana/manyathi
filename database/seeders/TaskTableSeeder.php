<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'id'    => 1,
                'name' => 'Visitations',
                'subphase_id' => 25,
                'description' => 'Visiting the needy'
            ],
            [
                'id'    => 2,
                'name' => 'Singing',
                'subphase_id' => 25,
                'description' => 'Songs and praises'
            ],
        ];

        Task::insert($tasks);
    }
}

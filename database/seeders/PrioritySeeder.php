<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $priorities = [
            [
                'priority' => 'Low'
            ],
            [
                'priority' => 'Medium'
            ],
            [
                'priority' => 'High'
            ]
        ];

        foreach ($priorities as $priority)
        {

            Priority::create($priority);

        }

    }
}

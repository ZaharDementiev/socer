<?php

namespace Database\Seeders;

use App\Models\CategoryVoting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryVotingsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votings = [
            ['category_id' => 6, 'needed_votes' => 100, 'deadline' => Carbon::now()->addDays(50)],
            ['category_id' => 7, 'needed_votes' => 200, 'deadline' => Carbon::now()->addDays(50)],
            ['category_id' => 8, 'current_votes' => 250, 'needed_votes' => 300, 'deadline' => Carbon::now()->addDay(), 'created_at' => Carbon::now()->subMonth(), 'updated_at' => Carbon::now()->subMonth()],
        ];

        foreach ($votings as $voting) {
            CategoryVoting::create($voting);
        }
    }
}

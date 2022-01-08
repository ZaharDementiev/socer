<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
          ['name' => 'Одесса'],
          ['name' => 'Яремче'],
          ['name' => 'Киев'],
          ['name' => 'Львов'],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
